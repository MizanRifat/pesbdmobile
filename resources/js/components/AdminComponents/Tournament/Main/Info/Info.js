import React, { useState,useEffect } from 'react';
import {makeStyles} from '@material-ui/core';
import { useSelector } from 'react-redux';

const useStyles = makeStyles(theme=>({
    td:{
        padding:'15px',
        
    },
    
}));

export default function Info({setTitle}) {
  
    const classes = useStyles();
    const {tournamentInfo:tournament,loading} = useSelector(state=>state.tournament)

    const formatOptions = [
        {
            label:'Round Robin League',
            value:1
        },
        {
            label:'Knockout',
            value:2 
        },
        {
            label:'Double Stage',
            value:3
        },
    ];


    const [fields, setFields] = useState([])

    useEffect(() => {
        setFields([
            {
                title:'Name',
                value:tournament.name
            },
            {
                title:'Slug',
                value:tournament.slug,
            },
            {
                title:'Format',
                value:formatOptions[tournament.format - 1].label
            },
            {
                title:'Rounds',
                value:tournament.rounds
            },
            {
                title:'Leg',
                value:tournament.leg
            },
            {
                title:'Active',
                value:tournament.active ? 'True' : 'False'
            },
        ])
    }, [tournament])

    useEffect(()=>{
        setTitle('Info')
    },[])

    return (
        <div>

            <table>
               {
                   fields.map((field,index)=>(
                    <tr>
                        <td className={classes.td}>{field.title}</td>
                        <td>:</td>
                        <td className={classes.td}>{field.value}</td>
                    
                    </tr>
                   ))
               }
            </table>
            
            
        </div>
    )
}
