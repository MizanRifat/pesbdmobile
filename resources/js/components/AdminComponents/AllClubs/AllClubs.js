import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core';
import {useSelector,useDispatch} from 'react-redux';
import {fetchAllClubs} from '@ducks/AllClubsDuck';
import CompContainer from '@customComponent/CompContainer';
import Mtable from '@customComponent/Mtable';
import TournamentList from './TournamentList';
import SelectTournaments from './SelectTournaments';
import { ListGroupItem1, ListGroupItem2 } from '@customComponent/ListGroupItem';
import useTableActions from '@customComponent/useTableActions';
import Notify from '@customComponent/Notify';
import { useHistory } from 'react-router-dom';
import { approveClub, updateClub } from '../../Redux/Ducks/AllClubsDuck';


const useStyles =makeStyles(theme=>({
   
}));

export default function AllClubs() {
    const classes = useStyles();

    const [open, setOpen] = useState(false)
    const [selectedClubIds, setSelectedClubIds] = useState([])
    const toast = Notify();

    const {allClubs,loading,fetching} = useSelector(state => state.allClubs);
    const dispatch = useDispatch()
    const history = useHistory()

    const tabelActions = {
        update:updateClub,
    }

    const {handleUpdateRow} = useTableActions(tabelActions)

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
            render : rowData => <ListGroupItem1 image={rowData.logo} label={rowData.name} to={`/club/${rowData.slug}`} medium />,

        },
        {
            title:'Approved',
            field:'approved',
            lookup:{
                0:'No',
                1:'Yes',
                2:'Pending'
            },

        },
        {
            title:'Tournaments',
            field:'tournaments',
            render : rowData => <TournamentList tournaments={rowData.tournaments} />,
            sorting:false,
            editable: 'never'

        },
        {
            title:'Owner',
            field:'owner.name',
            editable: 'never'

        }
    ]);

    const handleUpdate = (newData)=>{
        console.log({newData})
        const data = {
                id:newData.id,
                name: newData.name,
                approved:newData.approved
            };
        return handleUpdateRow(data)
    
    }

    const handleApprove = (club_id)=>{
        dispatch(approveClub(club_id))
        .then(response=>{
            console.log({response})
            toast(response,'success')
        })
        .catch(error=>{
            if(error.errorCode == 422){
                Object.keys(error.errors).map(err=>{
                    toast(error.errors[err],'error')
                })
            }else{
                toast(error.message,'error')
            }
        })
    }

    useEffect(()=>{
        if(allClubs.length === 0){
            dispatch(fetchAllClubs());
        }
    },[])

 

    return (
    
        <CompContainer title='Clubs'>
        

            <Mtable 
                columns={columns}
                data={allClubs}
                loading={loading || fetching}
                paging={true}
                editable={true}
                handleUpdateRow={handleUpdate}
                actions={[
                    {
                      icon: 'done',
                      tooltip: 'Approve Club',
                      onClick: (event, rowData) => handleApprove(rowData.id)
                    }
                  ]}

            />

            <SelectTournaments 
                open={open}
                setOpen={setOpen}
                club_ids={selectedClubIds}
            />
        
        </CompContainer>
    )
}
