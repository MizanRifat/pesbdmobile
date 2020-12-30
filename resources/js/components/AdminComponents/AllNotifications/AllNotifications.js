import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core';
import {useSelector,useDispatch} from 'react-redux';
import CompContainer from '@customComponent/CompContainer';
import Mtable from '@customComponent/Mtable';
import dateFormat from "dateformat";
import useTableActions from '@customComponent/useTableActions';
import { addNotification, deleteNotification, fetchNotifications, updateNotification } from '../../Redux/Ducks/AllNotificationsDuck';

const useStyles =makeStyles(theme=>({
    container:{
        padding:'10px'
    }
}));

export default function AllNotifications() {
    const classes = useStyles();

    const {notifications,fetching,loading} = useSelector(state => state.allNotifications);
    const dispatch = useDispatch()
   

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
            title:'Type',
            field:'type',

        },
        {
            title:'Notifiable Type',
            field:'notifiable_type',

        },
        {
            title:'Notifiable ID',
            field:'notifiable_id',
        },
        {
            title:'Read At',
            field:'read_at',
            render:(rowData)=>rowData.read_at != null ? dateFormat(rowData.read_at,'dd mmm,h:MM TT') : ''
        },
        {
            title:'Created At',
            field:'created_at',
            render:(rowData)=>dateFormat(rowData.created_at,'dd mmm,h:MM TT')
        },
    ]);

    const tabelActions = {
        add:addNotification,
        update:updateNotification,
        delete:deleteNotification,
    }

    const {handleAddRow,handleUpdateRow,handleDeleteRow} = useTableActions(tabelActions)


    useEffect(() => {
        dispatch(fetchNotifications())
    }, [])


    return (
    
        <CompContainer title='Notifications'>
        

            <Mtable 
                columns={columns}
                data={notifications}
                loading={fetching || loading}
                paging={true}
                handleDeleteRow={(oldData)=>handleDeleteRow(oldData.id)}
                editable={true}
               
                
            />
          
        
        </CompContainer>
    )
}
