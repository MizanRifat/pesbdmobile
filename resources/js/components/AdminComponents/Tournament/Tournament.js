import React, { useEffect } from 'react'
import DoubleSidebarLayout from '@customComponent/DoubleSidebarLayout'
import TournamentSidebar from './Sidebar/TournamentSidebar'
import Main from './Main/Main'
import { useHistory } from 'react-router-dom'
import { useSelector, useDispatch } from 'react-redux'
import {fetchInfo } from '@ducks/TournamentDuck'
import {fetchTournamentClubs } from '@ducks/TournamentClubsDuck'

export default function Tournament(props) {
    const history = useHistory();

    const {tournaments} = useSelector(state=> state.tournaments)
    const {tournamentInfo,fetching} = useSelector(state=> state.tournament)

    const dispatch = useDispatch();
    const slug = props.match.params.title;


    useEffect(()=>{
        const tournament = tournaments.find(item=>item.slug == slug)

        if(tournament == undefined){
            history.push('/error');
            return;
        }

        // dispatch(setTournament(tournament))
        dispatch(fetchInfo(slug))

    },[slug])


    return (
        <>

            {
                !fetching &&
                
                <DoubleSidebarLayout
                    sidebar={<TournamentSidebar />}
                    main={<Main />}
                    
                />
            }        
            
        </>
    )
}
