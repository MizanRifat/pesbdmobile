import React, { useState,useEffect } from 'react'
import {ListGroupItem1,ListGroupItem2} from '@customComponent/ListGroupItem';
import Mtable from '@customComponent/Mtable';
import {makeStyles} from '@material-ui/core';
import { useSelector, useDispatch } from 'react-redux';
import { fetchTournamentResults } from '@ducks/ResultsDuck';
import { frTableColumns } from '../../../../CData/table';


const useStyles = makeStyles(theme=>({

  
  }));

export default function Results() {

    const {results,fetching} = useSelector(state=>state.results);
    const {tournamentInfo} = useSelector(state=>state.tournament)
    const dispatch = useDispatch();

    const columns = frTableColumns('result') 

    useEffect(()=>{
        if(results.length === 0){
            dispatch(fetchTournamentResults(tournamentInfo.id))    
        }
    },[])


    return (
        <div className='responsiveTable frTable'>
            <Mtable
                frTable={true}
                columns={columns}
                data={results}
                paging={true}
                editable={false}
                loading={fetching}
                header={{display:'none'}}
                
            />
        </div>
    )
}