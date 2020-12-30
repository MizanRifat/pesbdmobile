import { postAction, getAction } from "./actions";

//urls

const fetch_users_url = `/api/myusers`;
const add_users_url = `/api/`;
const delete_users_url =(id)=> `/api/`;
const update_users_url = (id)=>`/api/`;


//actions

const USERS_FETCHED = 'pes/myusers/users_fetched';
const USERS_ADDED = 'pes/myusers/users_added';
const USERS_DELETED = 'pes/myusers/users_deleted';
const USERS_UPDATED = 'pes/myusers/users_updated';

const LOADING_TRUE = 'pes/myusers/loading_true';
const LOADING_FALSE = 'pes/myusers/loading_false';
const FETCHING_TRUE = 'pes/myusers/fetching_true';
const FETCHING_FALSE = 'pes/myusers/fetching_false';
const SET_ERRORS = 'pes/myusers/set_errors';

// reducers

const initState = {
    fetching:true,
    loading:false,
    users:[],
    error:{},
};

export default (state=initState,action)=>{
    switch (action.type) {
        case USERS_FETCHED:
            
            return {
                ...state,
                fetching:false,
                loading:false,
                users:action.payload,
                
            }

        case USERS_ADDED:
            
            return {
                ...state,
                loading:false,
                users:[...state.users,action.payload],
                
            }
        case USERS_UPDATED:
            
            return {
                ...state,
                loading:false,
                users:state.users.map(item=>item.id == action.payload.id ? action.payload : item),
                
            }
        case USERS_DELETED:
            
            return {
                ...state,
                loading:false,
                users:state.users.filter(item => item.id != action.payload),
                
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

export const usersFetched = (data) =>{
    return {
        type:USERS_FETCHED,
        payload:data
    }
}

export const usersUpdated = (data) =>{
    return {
        type:USERS_UPDATED,
        payload:data
    }
}
export const usersDeleted = (id) =>{
    return {
        type:USERS_DELETED,
        payload:id
    }
}
export const usersAdded = (data) =>{
    return {
        type:USERS_ADDED,
        payload:data
    }
}

export const setErrors = (error) =>{
    return {
        type:SET_ERRORS,
        payload:error
    }
}

export const fetchUsers = () => (dispatch) => {
    
    const url = fetch_users_url;
    const actions={
        loading:{type:FETCHING_TRUE},
        success:usersFetched,
        error:setErrors
    }
    return getAction(actions,url,dispatch);
}

export const addUsers = (newData) => (dispatch) => {
    
    const url = add_users_url;
    const actions={
        loading:{type:LOADING_TRUE},
        success:usersAdded,
        error:setErrors
    }
    return postAction(actions,url,newData,dispatch);
}

export const updateUsers = (newData) => (dispatch) => {

    const url = update_users_url();
    const actions={
        loading:{type:LOADING_TRUE},
        success:usersUpdated,
        error:setErrors
    }
    return postAction(actions,url,newData,dispatch,'put');
}

export const deleteUsers = (id) => (dispatch) => {

    const url = delete_users_url(id);
    const actions={
        loading:{type:LOADING_TRUE},
        success:usersDeleted,
        error:setErrors
    }
    return postAction(actions,url,{},dispatch,'delete');
}
