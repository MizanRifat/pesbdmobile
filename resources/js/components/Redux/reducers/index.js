import UsersReducer from '../Ducks/UsersDuck';
import {combineReducers} from 'redux';
import FixturesReducer from '../Ducks/FixturesDuck';
import ClubReducer from '../Ducks/ClubDuck';
import ResultsReducer from '../Ducks/ResultsDuck';
import TournamentsReducer from '../Ducks/TournamentsDuck';
import TournamentReducer from '../Ducks/TournamentDuck';
import OfficialsReducer from '../Ducks/OfficialsDuck';
import UpdateResultReducer from '../Ducks/UpdateResultDuck';
import StandingsReducer from '../Ducks/StandingsDuck';
import PlayerStatsReducer from '../Ducks/PlayersStatsDuck';
import SessionUserReducer from '../Ducks/SessionUserDuck';
import SessionAdminReducer from '../Ducks/SessionAdminDuck';
import NotificationReducer from '../Ducks/NotificationsDuck';
import GinfoReducer from '../Ducks/GInfoDuck';
import TournamentClubsReducer from '../Ducks/TournamentClubsDuck'
import AllClubsReducer from '../Ducks/AllClubsDuck';
import ClubSquadReducer from '../Ducks/ClubSquadDuck';
import CuClubReducer from '../Ducks/CuClubDuck';
import EventsReducer from '../Ducks/MatchEventsDuck';
import RatingsReducer from '../Ducks/MatchRatingsDuck';
import ImagesReducer from '../Ducks/MatchImagesDuck';
import ResultDetailsReducer from '../Ducks/ResultDetailsDuck';
import PlayerModelsReducer from '../Ducks/PlayerModelsDuck';
import ClubModelsReducer from '../Ducks/ClubModelsDuck';
import AllNotificationsReducer from '../Ducks/AllNotificationsDuck';
import MyUsersReducer from '../Ducks/MyUsersDuck';

export const reducers = combineReducers({
    users:UsersReducer,
    fixtures:FixturesReducer,
    results:ResultsReducer,
    // info:InfoReducer,
    club:ClubReducer,
    // clubs:ClubsReducer,
    allClubs:AllClubsReducer,
    clubSquad:ClubSquadReducer,
    tournaments:TournamentsReducer,
    tournament:TournamentReducer,
    tournamentClubs:TournamentClubsReducer,
    officials:OfficialsReducer,
    updateResult:UpdateResultReducer,
    standings:StandingsReducer,
    playerStats:PlayerStatsReducer,
    sessionUser:SessionUserReducer,
    sessionAdmin:SessionAdminReducer,
    notifications:NotificationReducer,
    cuClub:CuClubReducer,
    gInfo:GinfoReducer,
    events:EventsReducer,
    ratings:RatingsReducer,
    images:ImagesReducer,
    resultDetails:ResultDetailsReducer,
    playerModels:PlayerModelsReducer,
    clubModels:ClubModelsReducer,
    allNotifications:AllNotificationsReducer,
    myUsers:MyUsersReducer,
    
})
