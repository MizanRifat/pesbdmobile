import { postAction, getAction } from "./actions";

//urls

const fetch_notifications_url = `/api/notifications`;
const add_notifications_url = `/api/`;
const delete_notifications_url =(id)=> `/api/notification/${id}`;
const update_notifications_url = (id)=>`/api/`;


//actions

const NOTIFICATIONS_FETCHED = 'pes/notifications/notifications_fetched';
const NOTIFICATION_ADDED = 'pes/notifications/notifications_added';
const NOTIFICATION_DELETED = 'pes/notifications/notifications_deleted';
const NOTIFICATION_UPDATED = 'pes/notifications/notifications_updated';

const LOADING_TRUE = 'pes/notifications/loading_true';
const LOADING_FALSE = 'pes/notifications/loading_false';
const FETCHING_TRUE = 'pes/notifications/fetching_true';
const FETCHING_FALSE = 'pes/notifications/fetching_false';
const SET_ERRORS = 'pes/notifications/set_errors';

// reducers

const initState = {
    fetching:true,
    loading:false,
    notifications:[],
    error:{},
};

export default (state=initState,action)=>{
    switch (action.type) {
        case NOTIFICATIONS_FETCHED:
            
            return {
                ...state,
                fetching:false,
                loading:false,
                notifications:action.payload,
                
            }

        case NOTIFICATION_ADDED:
            
            return {
                ...state,
                loading:false,
                notifications:[...state.notifications,action.payload],
                
            }
        case NOTIFICATION_UPDATED:
            
            return {
                ...state,
                loading:false,
                notifications:state.notifications.map(item=>item.id == action.payload.id ? action.payload : item),
                
            }
        case NOTIFICATION_DELETED:
            
            return {
                ...state,
                loading:false,
                notifications:state.notifications.filter(item => item.id != action.payload),
                
            }
        case LOADING_TRUE:
            
            return {
                ...state,
                loading:true
            }
        case LOADING_FALSE:
            
            return {
                ...state,
                loading:false
            }
        case FETCHING_TRUE:
            
            return {
                ...state,
                fetching:true
    
            }
        case FETCHING_FALSE:
            
            return {
                ...state,
                fetching:false,
            }
        case SET_ERRORS:
            
            return {
                ...state,
                loading:false,
                fetching:false,
                error:action.payload
            }
    
        default:
            return state;
    }
}

// action_creators

export const notificationsFetched = (data) =>{
    return {
        type:NOTIFICATIONS_FETCHED,
        payload:data
    }
}

export const notificationUpdated = (data) =>{
    return {
        type:NOTIFICATION_UPDATED,
        payload:data
    }
}
export const notificationDeleted = (id) =>{
    return {
        type:NOTIFICATION_DELETED,
        payload:id
    }
}
export const notificationAdded = (data) =>{
    return {
        type:NOTIFICATION_ADDED,
        payload:data
    }
}

export const setErrors = (error) =>{
    return {
        type:SET_ERRORS,
        payload:error
    }
}

export const fetchNotifications = () => (dispatch) => {
    
    const url = fetch_notifications_url;
    const actions={
        loading:{type:FETCHING_TRUE},
        success:notificationsFetched,
        error:setErrors
    }
    return getAction(actions,url,dispatch);
}

export const addNotification = (newData) => (dispatch) => {
    
    const url = add_notifications_url;
    const actions={
        loading:{type:LOADING_TRUE},
        success:notificationAdded,
        error:setErrors
    }
    return postAction(actions,url,newData,dispatch);
}

export const updateNotification = (newData) => (dispatch) => {

    const url = update_notifications_url();
    const actions={
        loading:{type:LOADING_TRUE},
        success:notificationUpdated,
        error:setErrors
    }
    return postAction(actions,url,newData,dispatch,'put');
}

export const deleteNotification = (id) => (dispatch) => {

    const url = delete_notifications_url(id);
    const actions={
        loading:{type:LOADING_TRUE},
        success:notificationDeleted,
        error:setErrors
    }
    return postAction(actions,url,{},dispatch,'delete');
}
