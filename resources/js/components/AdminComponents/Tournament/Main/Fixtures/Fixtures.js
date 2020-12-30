import React,{useState,useEffect} from 'react';
import {makeStyles, Button} from '@material-ui/core';
import FixtureDialog from './FixtureDialog';
import { useSelector, useDispatch } from 'react-redux';
import Notify from '@customComponent/Notify';
import Mtable from '@customComponent/Mtable';
import { MTableToolbar } from 'material-table';
import { fetchTournamentFixtures } from '@ducks/FixturesDuck';
import useTableActions from '@customComponent/useTableActions'
import { editableFixtureTableColumns } from '../../../../CData/table';
import { updateFixture,deleteFixture,addFixture} from '@ducks/FixturesDuck';
import { createTournamentFixtures } from '../../../../Redux/Ducks/FixturesDuck';

const useStyles = makeStyles(theme=>({
    
    toolbar:{
        padding:'0 !important',
        
    },
    createbtn:{
        background:theme.palette.primary.dark,
        borderRadius:0
    }
}))


export default function Fixtures(props) {
    const classes  = useStyles();
    const {setTitle} = props

    const toast = Notify();

    const {fixtures,fetching,loading} = useSelector(state=>state.fixtures)
    const {tournamentInfo} = useSelector(state=>state.tournament)
    const {clubs} = useSelector(state=>state.tournamentClubs)
    

    const dispatch = useDispatch();

    console.log({fixtures})

    const [dialogOpen,setDialogOpen] = useState(false)

    const tabelActions = {
        add:addFixture,
        update:updateFixture,
        delete:deleteFixture,
    }

    const {handleAddRow,handleUpdateRow,handleDeleteRow} = useTableActions(tabelActions)



    const columns = editableFixtureTableColumns(clubs)
 

    const handleMultipleEdit = (e,data)=>{
        setDialogOpen(true)
        console.log(data)
    }

    const handleCreateTournamentFixtures = () => {
        dispatch(createTournamentFixtures(tournamentInfo.id))
        .then(response=>{
            console.log({response})
            toast(response,'success')
        })
        .catch(error=>{
            toast(error.message,'error')
        })
    }

    const handleAdd = (newData) => {
        console.log({newData})

        const data = {
            team1_id:newData.team1_id,
            team2_id:newData.team2_id,
            tournament_id:tournamentInfo.id,
            date:newData.date,
            group:newData.group,
            round:newData.round,
            leg:newData.leg,
        }

        return handleAddRow(data)
    }

    const handleUpdate = (newData) => {

        console.log({newData})

        const data = {
            id:newData.id ,
            team1_id:newData.team1_id,
            team2_id:newData.team2_id,
            date:newData.date,
            group:newData.group,
            round:newData.round,
            leg:newData.leg,
        }

        return handleUpdateRow(data)
        
    }

    useEffect(()=>{
        setTitle('Fixtures')
        if(fixtures.length === 0){
            dispatch(fetchTournamentFixtures(tournamentInfo.id))    
        }

        
    },[])

    return (
        <>
            <Mtable 
                title={fixtures.length == 0 ?  <CreateFixturesBtn handleCreateTournamentFixtures={handleCreateTournamentFixtures} />: ''}
                columns={columns}
                data={fixtures}
                loading={loading || fetching }
                handleAddRow={handleAdd}
                handleUpdateRow={handleUpdate}
                handleDeleteRow={(oldData)=>handleDeleteRow(oldData.id)}
                paging={true}
                // selectMode={true}
                editable={true}
                actions={[
                    {
                      tooltip: 'Remove Selected',
                      icon: 'delete',
                      onClick: (event, data) => console.log(data),
                      position:'toolbarOnSelect'
                      
                    },
                    {
                        icon: 'edit',
                        tooltip: 'Edit Selected',
                        onClick: (event, data) => handleMultipleEdit(event,data),
                        position:'toolbarOnSelect'
                        
                    },
                  ]}
                components={{
                    Toolbar: props => (
                            <MTableToolbar {...props} classes={{root:classes.toolbar}} />
                        
                    ),
                }}
            />


            <FixtureDialog
                open={dialogOpen}
                setOpen={setDialogOpen}
            />
      </>
    )
}

function CreateFixturesBtn({handleCreateTournamentFixtures}){
    const classes  = useStyles();

    return(
        <Button color='primary' variant='contained' className={classes.createbtn} onClick={handleCreateTournamentFixtures}>Create Fixtures</Button>
    )
}