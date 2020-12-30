import { postAction, getAction } from "./actions"

//urls

const fetch_all_clubs_url = `/api/clubs`;
const update_club_url = (club_id)=>`/api/club/${club_id}`;
const approve_club_url = (club_id)=>`/api/club/approve/${club_id}`;

//actions

const ALL_CLUBS_FETCHED = 'pes/all_clubs/all_clubs_fetched';
const CLUB_UPDATED = 'pes/all_clubs/club_updated';
const CLUB_DELETED = 'pes/all_clubs/club_deleted';
const CLUB_APPROVED = 'pes/all_clubs/club_approved';

const LOADING_TRUE = 'pes/all_clubs/loading_true';
const LOADING_FALSE = 'pes/all_clubs/loading_false';
const FETCHING_FALSE = 'pes/all_clubs/fetching_true';
const FETCHING_TRUE = 'pes/all_clubs/fetching_false';
const SET_ERRORS = 'pes/all_clubs/set_errors';


//reducer

const initState = {
    loading:false,
    fetching:true,
    allClubs:[],
    error:{
        message:'',
        errors:{},
        errorCode:''
    },
};


export default (state=initState,action)=>{
    switch (action.type) {

        case ALL_CLUBS_FETCHED:
            
            return {
                ...state,
                allClubs:action.payload,
                fetching:false
            }
    
        case CLUB_APPROVED:
        case CLUB_UPDATED:
            
            return {
                ...state,
                loading:false,
                allClubs:state.allClubs.map(club=> club.id == action.payload.id ? {...action.payload,owner:club.owner,tournaments:club.tournaments} : club ),
            }
        case CLUB_DELETED:
            
            return {
                ...state,
                loading:false,
                allClubs:state.clubs.filter(club=> club.id != action.payload),
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
                fetching:false
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

//action_creators


export const allClubsFetched = (clubs) =>{
    return {
        type:ALL_CLUBS_FETCHED,
        payload:clubs
    }
}

export const clubUpdated = (data) =>{
    return {
        type:CLUB_UPDATED,
        payload:data
    }
}
export const clubApproved = (data) =>{
    return {
        type:CLUB_APPROVED,
        payload:data
    }
}
export const clubsDeleted = (ids) =>{
    return {
        type:CLUB_DELETED,
        payload:ids
    }
}

export const setErrors = (error) =>{
    return {
        type:SET_ERRORS,
        payload:error
    }
}


export const fetchAllClubs = () => (dispatch) =>{
  
    const url = fetch_all_clubs_url,
    actions={
        loading:{type:FETCHING_TRUE},
        success:allClubsFetched,
        error:setErrors
    }
    return getAction(actions,url,dispatch);
}

export const updateClub = (data) => (dispatch) => {

    const url = update_club_url(data.id);
    const actions={
        loading:{type:LOADING_TRUE},
        success:clubUpdated,
        error:setErrors
    }
    return postAction(actions,url,data,dispatch,'put');
}
export const approveClub = (club_id) => (dispatch) => {

    const url = approve_club_url(club_id);
    const actions={
        loading:{type:LOADING_TRUE},
        success:clubApproved,
        error:setErrors
    }
    return postAction(actions,url,{},dispatch,'put');
}
