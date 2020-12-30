import React, { useEffect, useState } from 'react';
import {makeStyles} from '@material-ui/core';
import { useSelector, useDispatch } from 'react-redux';
import SearchComp from '@customComponent/SearchComp';
import Mtable from '@customComponent/Mtable';
import {ListGroupItem1} from '@customComponent/ListGroupItem'
import useTableActions from '@customComponent/useTableActions';
import { addClubInTournament,removeClubFromTournament } from '@ducks/TournamentClubsDuck';


const useStyles = makeStyles(theme=>({

  }));
  


export default function Clubs({setTitle}) {

    const {tournamentInfo} = useSelector(state=> state.tournament)
    const {clubs,loading,fetching} = useSelector(state=> state.tournamentClubs)


    const tabelActions = {
        add:addClubInTournament,
        delete:removeClubFromTournament,
    }

    const {handleAddRow,handleDeleteRow} = useTableActions(tabelActions)



    const [columns, setColumns] = useState([
        {
            title:'ID',
            field:'id',
            width:'50px',
            headerStyle: {
                padding:'16px 10px',
                textAlign:'center'
            },
            editable: 'never'
        },
        {
            title:'Club',
            field:'name',
            render : rowData => <ListGroupItem1 image={rowData.logo} label={rowData.name} />,
            editComponent: props => <SearchComp searchurl='/api/club/search' label='clubs' props={props} />

        },
        {
            title:'Owner',
            field:'owner.name',
            editable: 'never'

        }
    ]);

 
    const handleAdd = (newData) => {
        const data = {
            'club_id':newData.name,
            'tournament_id':tournamentInfo.id
        }

        return handleAddRow(data);
    }


    const handleDelete = (oldData) => {
        const data = {
            'club_id':oldData.id,
            'tournament_id':tournamentInfo.id
        }

        return handleDeleteRow(data)
    }
    

    useEffect(()=>{
        setTitle('Clubs')

        // dispatch(fetchTournamentClubs(tournamentInfo.id))
    },[])

    return (
        <Mtable 

              columns={columns}
              data={clubs}
              loading={fetching || loading}
              handleAddRow={handleAdd}
              handleDeleteRow={handleDelete}
              paging={true}
              editable={true}
          
          />


    )
}

