import { getAction,postAction } from "./actions"

// urls

const tournament_fixtures_fetching_url = (id)=> `/api/tournament/fixtures/${id}?teamdetails=1`;
const update_fixture_url =(id)=> `/api/fixture/${id}`;
const add_fixture_url = '/api/fixture';
const delete_fixture_url = (id)=> `/api/fixture/${id}`;
const create_tournament_fixtures_url = (id)=> `/api/tournament/fixtures/create/${id}`;


//actions

const TOURNAMENT_FIXTURES_FETCHED = 'pes/fixtures/tournament_fixtures_fetched';
const FIXTURE_DELETED = 'pes/fixtures/tournament_fixtures_deleted';
const FIXTURE_UPDATED = 'pes/fixtures/tournament_fixtures_updated';
const FIXTURE_ADDED = 'pes/fixtures/tournament_fixtures_added';

const LOADING_TRUE = 'pes/fixtures/loading_true';
const LOADING_FALSE = 'pes/fixtures/loading_false';
const FETCHING_FALSE = 'pes/fixtures/fetching_true';
const FETCHING_TRUE = 'pes/fixtures/fetching_false';
const SET_ERRORS = 'pes/fixtures/set_errors';


//reducers

const initState = {
    fetching:true,
    loading:false,
    fixtures:[],
    error:{},
};

export default (state=initState,action)=>{
    switch (action.type) {

        case TOURNAMENT_FIXTURES_FETCHED:
            
            return {
                ...state,
                fixtures:action.payload,
                loading:false,
                fetching:false

            }
        
        case FIXTURE_DELETED:
        
            return {
                ...state,
                loading:false,
                fixtures:state.fixtures.filter(fixture=> fixture.id != action.payload),
                success:action.payload.message
            }
        case FIXTURE_ADDED:
        
            return {
                ...state,
                loading:false,
                fixtures:[...state.fixtures,action.payload]
            }
        case FIXTURE_UPDATED:
            return {
                ...state,
                loading:false,
                fixtures:state.fixtures.map(fixture=>(
                    fixture.id === action.payload.id ? action.payload : fixture 
                ))
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
                error:action.payload
            }
        case 'RESET':
            
            return {
                loading:true,
                fixtures:[],
                error:{},
            }
    
        default:
            return state;
    }
}

//action_creators


export const tournamentFixturesFetched = (fixtures) =>{
    return {
        type:TOURNAMENT_FIXTURES_FETCHED,
        payload:fixtures
    }
}
export const fixtureAdded = (data) =>{
    return {
        type:FIXTURE_ADDED,
        payload:data
    }
}
export const fixtureUpdated = (data) =>{
    return {
        type:FIXTURE_UPDATED,
        payload:data
    }
}
export const fixtureDeleted = (id) =>{
    return {
        type:FIXTURE_DELETED,
        payload:id
    }
}
export const setErrors = (errors) =>{
    return {
        type:SET_ERRORS,
        payload:errors
    }
}

export const fetchTournamentFixtures = (tournament_id) => (dispatch) =>{
  
    const url = tournament_fixtures_fetching_url(tournament_id),
    actions={
        loading:{type:FETCHING_TRUE},
        success:tournamentFixturesFetched,
        error:setErrors
    }
    return getAction(actions,url,dispatch);
}

export const createTournamentFixtures = (tournament_id) => (dispatch) =>{
  
    const url = create_tournament_fixtures_url(tournament_id),
    actions={
        loading:{type:LOADING_TRUE},
        success:tournamentFixturesFetched,
        error:setErrors
    }
    return postAction(actions,url,{},dispatch);
}

export const addFixture = (newData) => (dispatch) => {

    const url = add_fixture_url;
    const actions={
        loading:{type:LOADING_TRUE},
        success:fixtureAdded,
        error:setErrors
    }
    return postAction(actions,url,newData,dispatch);
}

export const updateFixture = (newData) => (dispatch) => {

    const url = update_fixture_url(newData.id);
    const actions={
        loading:{type:LOADING_TRUE},
        success:fixtureUpdated,
        error:setErrors
    }
    return postAction(actions,url,newData,dispatch,'put');
}
export const deleteFixture = (id) => (dispatch) => {

    const url = delete_fixture_url(id);
    const actions={
        loading:{type:LOADING_TRUE},
        success:fixtureDeleted,
        error:setErrors
    }
    return postAction(actions,url,{},dispatch,'delete');
}