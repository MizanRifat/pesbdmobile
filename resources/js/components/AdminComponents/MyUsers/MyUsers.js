import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core';
import {useSelector,useDispatch} from 'react-redux';
import CompContainer from '@customComponent/CompContainer';
import Mtable from '@customComponent/Mtable';
import useTableActions from '@customComponent/useTableActions';
import { fetchUsers } from '../../Redux/Ducks/MyUsersDuck';

const useStyles =makeStyles(theme=>({
    container:{
        padding:'10px'
    }
}));

export default function MyUsers() {

    const classes = useStyles();
    const {users,fetching,loading} = useSelector(state => state.myUsers);

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
            title:'Name',
            field:'name',

        },
        {
            title:'Email',
            field:'email',

        },
        {
            title:'Password',
            field:'password',

        },
    ]);

 


    useEffect(()=>{
        dispatch(fetchUsers())
    },[])


    return (
    
        <CompContainer title='My Users'>
        

            <Mtable 
                columns={columns}
                data={users}
                loading={loading || fetching}
                paging={true}
                // handleAddRow={handleAddRow}
                // handleUpdateRow={(newData)=>handleUpdateRow(newData)}
                // handleDeleteRow={(oldData)=>handleDeleteRow(oldData.id)}
                editable={false}
               
                
            />
          
        
        </CompContainer>
    )
}
