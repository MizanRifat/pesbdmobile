import React,{useState,useEffect} from 'react';
import {makeStyles} from '@material-ui/core';
import DetailPanel from './DetailPanel';
import { useSelector, useDispatch } from 'react-redux';
import Mtable from '@customComponent/Mtable';
import { fetchTournamentResults } from '@ducks/ResultsDuck';
import { ListGroupItem1, ListGroupItem2 } from '@customComponent/ListGroupItem';

const useStyles = makeStyles(theme=>({

  }));
  

export default function Results({setTitle}) {

    const {results,fetching,loading} = useSelector(state=>state.results);
    const {tournamentInfo} = useSelector(state=>state.tournament)
    const dispatch = useDispatch();

    const [columns, setcolumns] = useState([
        {
            title:'ID',
            field:'id',
            cellStyle: {
                width: 10,
                maxWidth: 5,
                padding:0
            },
            headerStyle: {
                width:10,
                maxWidth: 5,
                padding:0
            },
            editable: 'never',
            sorting:false
        },
        {
            'title':'Team1',
            field:'team1_details.name',
            render : rowData => <ListGroupItem1 mini image={rowData.team1_details.logo} label={rowData.team1_details.name} />,
            editable: 'never'

        },
        {
            field:'team1_goals',
            cellStyle: {
                width: 10,
                maxWidth: 10,
            },
            headerStyle: {
                width:10,
                maxWidth: 10,
            },
        },
        {
            field:'team2_goals',
            cellStyle: {
                width: 10,
                maxWidth: 10,
                padding:0
            },
            headerStyle: {
                width:10,
                maxWidth: 10,
                padding:0
            },
        },
        {
            'title':'Team2',
            field:'team2_details.name',
            render : rowData => <ListGroupItem1 mini image={rowData.team2_details.logo} label={rowData.team2_details.name} />,
            editable: 'never'
        },
        {
            title:'Approved By',
            field:'approved_by'
            
        },
        

    ])


    useEffect(()=>{
        setTitle('Results')
        if(results.length === 0){
            dispatch(fetchTournamentResults(tournamentInfo.id))    
        }
    },[])

    return (
        
        <Mtable 
            columns={columns}
            data={results}
            loading={loading || fetching}
            paging={true}
            detailPanel={rowData => <DetailPanel id={rowData.id} team1_id={rowData.team1_id} team2_id={rowData.team2_id}/>}
        />
    )
}
