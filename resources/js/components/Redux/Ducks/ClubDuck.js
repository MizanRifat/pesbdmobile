import { postAction, getAction } from "./actions";
import { setSquad } from "./ClubSquadDuck";

//urls

const fetch_club_url = (slug)=>`/api/club/${slug}`;
const send_approve_req_url = (club_id)=>`/api/club/approve/request/${club_id}`;

//actions

const SET_CLUB = 'pes/club/set_club';
const CLUB_FETCHED = 'pes/club/club_fetched';
const CLUB_APPROVED = 'pes/club/club_approved';
const REQUEST_SENT = 'pes/club/request_sent';
const FETCHING_TRUE = 'pes/club/fetching_true';
const FETCHING_FALSE = 'pes/club/fetching_false';
const LOADING_TRUE = 'pes/club/loading_true';
const LOADING_FALSE = 'pes/club/loading_false';
const SET_ERRORS = 'pes/club/set_errors';

// reducers
const initState = {
    fetching:true,
    loading:false,
    club:{},
    error:{},
};

export default (state=initState,action)=>{
    switch (action.type) {
        case SET_CLUB:
        case CLUB_FETCHED:
            
            return {
                ...state,
                fetching:false,
                club:action.payload,
                
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
        case REQUEST_SENT:
            
            return {
                ...state,
                loading:false,
                club:{...state.club,approved:action.payload}
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
        case SET_ERRORS:
            
            return {
                ...state,
                fetching:false,
                error:action.payload
            }
    
        default:
            return state;
    }
}
// action_creators
export const clubFetched = (data) =>{
    return {
        type:CLUB_FETCHED,
        payload:data
    }
}
export const requestSent = (data) =>{
    return {
        type:REQUEST_SENT,
        payload:data.approved
    }
}
export const setClub = (data) =>{
    return {
        type:SET_CLUB,
        payload:data.club
    }
}
export const setErrors = (error) =>{
    return {
        type:SET_ERRORS,
        payload:error
    }
}
export const fetchClub = (slug) => (dispatch) => {
    
    const url = fetch_club_url(slug);
    const actions={
        loading:{type:FETCHING_TRUE},
        success:[clubFetched,setSquad],
        error:setErrors
    }
    return getAction(actions,url,dispatch);
}
export const sendApproveRequest = (club_id) => (dispatch) => {

    const url = send_approve_req_url(club_id);
    const actions={
        loading:{type:LOADING_TRUE},
        success:requestSent,
        error:setErrors
    }
    return postAction(actions,url,{},dispatch,'put');
}
	