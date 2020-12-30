import React,{useState, useEffect} from 'react'
import Grid from '@material-ui/core/Grid';
import EventTable from '@customComponent/EventTable';
import { useSelector } from 'react-redux';
import clsx from 'clsx';

export default function EventPanel() {

    const {
        events,
        loading,
    } = useSelector(state => state.events)
    
    const {fixture} = useSelector(state => state.updateResult)

    
    return (
        <>
            <Grid container spacing={3}>
                <Grid item xs={12} sm={6}>
                    
                    <EventTable
                        players={fixture.team1_details.players}
                        club={fixture.team1_details}
                        events={events.filter(item=>item.club_id == fixture.team1_details.id)}
                        loading={loading}
                        fixture_id={fixture.id}
                        editable={true}
                    />
                    
                </Grid>

                <Grid item xs={12} sm={6}>
                    <EventTable
                        players={fixture.team2_details.players}
                        club={fixture.team2_details}
                        events={events.filter(item=>item.club_id == fixture.team2_details.id)}
                        loading={loading}
                        fixture_id={fixture.id}
                        editable={true}
                    />
                </Grid>
            
            </Grid>
           
        </>
    )
}

