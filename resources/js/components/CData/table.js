import React, { useState, useEffect } from 'react';
import {ListGroupItem1,ListGroupItem2} from '@customComponent/ListGroupItem'
import Versus from '@customComponent/Versus'
import SelectDate from '@customComponent/SelectDate'
import dateFormat from "dateformat";


const playerLookup = (players) =>{
    const obj = {};
    players.map(player=>{
        obj[player.id] = player.name
    })
    return obj;
}
const ratingLookup = () =>{
    const obj = {};
    for (let index = 0; index < 11; index++) {
        obj[index] = index
        
    }
    return obj;
}

export const editableRatingsTableColumns = (players) => {

    return [

        {
            title:'Player',
            field:'player_id',
            // field:'player.name',
            lookup:playerLookup(players),
            cellStyle:{
                padding:'5px',
                fontSize:'12px',
                // textAlign:'center'
            }
        },
        {
            title:'Rating',
            field:'rating',
            lookup:ratingLookup(),
            cellStyle:{
                padding:'8px',
                fontSize:'12px',
                textAlign:'center'
                
            },
            headerStyle:{
                textAlign:'center'
            },
        },
    ]
}
export const editableEventsTableColumns = (players) => {


    return [
        
        {
            title:'Event',
            field:'event_id',
            lookup:{
                1:'Goal',
                2:'YC',
                3:'RC',
                4:'OG' 
            },
            

            cellStyle:{
                padding:'5px',
                fontSize:'12px',
            },
            width:'50px',
        },
        {
            title:'Player',
            field:'player_id',
            // field:'player.name',
            lookup:playerLookup(players),
            cellStyle:{
                padding:'5px',
                fontSize:'12px',
                // textAlign:'center'
            }
        },
        {
            title:'Min',
            field:'minute',
            cellStyle:{
                padding:'5px',
                fontSize:'12px',
                // textAlign:'center'
            },
            
        },
        {
            title:'Assisted',
            field:'assist_player_id',
            lookup:{
                ...playerLookup(players)
            },
            cellStyle:{
                padding:'5px',
                fontSize:'12px',
                // textAlign:'center'
                
            }
        },
    ]
}

export const eventsTableColumns = () => {


    return [
        
        {
            title:'Event',
            field:'event_id',
            lookup:{
                1:'Goal',
                2:'YC',
                3:'RC',
                4:'OG' 
            },
            
            width:'50px',
        },
        {
            title:'Player',
            field:'player.name',
           
        },
        {
            title:'Min',
            field:'minute',
          
            
        },
        {
            title:'Assisted',
            field:'assist_player.name',
           
        },
    ]
}

export const ratingsTableColumns = () => {
    return [
        // {
        //     title:'any',
        //     render:()=>'ds'
        // },
        {
            title:'Player',
            field:'player.name',
            // cellStyle:{
            //     padding:'5px',
            //     fontSize:'12px',
                
            // },
            editable:'never'
        },
        {
            title:'Rating',
            field:'rating',
            // cellStyle:{
            //     padding:'5px',
            //     fontSize:'12px',
            // }
        },
    ]
}

export const frTableColumns = (panel) => [
    {
        field:'team1_details.name',
        render: rowData => (<ListGroupItem1 label={rowData.team1_details.name} image={rowData.team1_details.logo} panel='user' />),
    },
    {
        render:rowData => <Versus panel='vs' data={rowData} adb={panel == 'fixture'} vdb={panel == 'result'} />
    },
    {
        field:'team2_details.name',
        render: rowData => <ListGroupItem2 
                                label={rowData.team2_details.name} 
                                image={rowData.team2_details.logo} 
                                containerStyle={{justifyContent:'flex-end'}} 
                            />
    },
]

export const editableFixtureTableColumns = (players) => {
    return [
        {
            title:'ID',
            field:'id',
            editable: 'never',
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
            title:'Team1',
            field:'team1_id',
            render:(rowData)=><ListGroupItem1 mini image={rowData.team1_details.logo} label={rowData.team1_details.name} />,
            lookup:playerLookup(players)
            
        },
  
        {
            title:'Team2',
            field:'team2_id',
            render:(rowData)=><ListGroupItem1 mini image={rowData.team2_details.logo} label={rowData.team2_details.name} />,
            lookup:playerLookup(players)
        },
        {
            title:'Date',
            field:'date',
            render:rowData => rowData.date != 'N/A' ? dateFormat(rowData.date,'dd mmm yy,h:MM TT') : rowData.date,
            editComponent: props => <SelectDate
                                        rowData={props.rowData}
                                        props={props}
                                    />
        },
        {
            title:'Group',
            width:'50px',
            field:'group',
            lookup:{
                null:'N/A',
                0:'N/A',
                1:'A',  
                2:'B',  
                3:'C',  
                4:'D',  
            },
        },
        {
            title:'Round',
            field:'round',
            width:'50px',
            
        },
        {
            title:'Leg',
            field:'leg',
            width:'50px',
            headerStyle: {
                padding:'16px 0px',
                textAlign:'center'
            },
            lookup:{
                1:1,
                2:2
            }
        },

    ]
}

