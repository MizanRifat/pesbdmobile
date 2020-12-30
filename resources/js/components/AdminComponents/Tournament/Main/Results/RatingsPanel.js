import React,{useState, useEffect} from 'react'
import { Grid,makeStyles } from '@material-ui/core'
import { useDispatch, useSelector } from 'react-redux';
import RatingsTable from '@customComponent/RatingsTable'

const useStyles = makeStyles(theme=>({
 
}))

export default function RatingsPanel() {

    const classes  = useStyles();

    const {
        ratings,
        loading,
        fetching
    } = useSelector(state => state.ratings)
    
    
    const {
        fixture,
    } = useSelector(state => state.updateResult)

    const dispatch = useDispatch();

    
   
    return (
     
            <Grid container spacing={3}>
                <Grid item xs={12} sm={6}>
                    
                    <RatingsTable 
                        players={fixture.team1_details.players}
                        club={fixture.team1_details}
                        team={1}
                        ratings={ratings.filter(item=>item.club_id == fixture.team1_details.id)}
                        fixture_id={fixture.id}
                        editable={true}
                    />
                </Grid>

                <Grid item xs={12} sm={6}>
                    <RatingsTable 
                        players={fixture.team2_details.players}
                        club={fixture.team2_details}
                        team={2}
                        ratings={ratings.filter(item=>item.club_id == fixture.team2_details.id)}
                        fixture_id={fixture.id}
                        editable={true}
                    />
                </Grid>
            
            </Grid>

    )
}

