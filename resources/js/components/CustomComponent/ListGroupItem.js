import React from 'react';
import {makeStyles} from '@material-ui/core';
import clsx from 'clsx';
import { Link } from 'react-router-dom';


const useStyles = makeStyles(theme=>({

    image:{
        height:'100%',
    },
    image1:{
        marginRight:5
    },
    image2:{
        marginLeft:5
    },
    mini:{
        height:'25px !important',
    },
    medium:{
        height:'35px !important',
    },
    container:{
        height:'50px',
        display:'flex',
        alignItems:'center',
        ['@media (max-width:480px)'] : {
            margin:'5px 0'
          }
    },
    link:{
        color:'black'
    }
  }));



export function ListGroupItem1({image,icon,label,mini,to,medium,imageStyle={},containerStyle={},labelStyle={}}) {
    const classes = useStyles();
    return(

        <div className={clsx(classes.container)} style={containerStyle}>
            {
                image && 
                <img 
                    src={image} 
                    className={clsx(classes.image,classes.image1,{
                        [classes.mini] : mini,
                        [classes.medium] : medium
                    })} 
                    style={imageStyle} 
                />
            }
            
            {icon}
            {
                to ? 
                <Link to={to} className={classes.link} style={labelStyle}>{label}</Link> 
                :
                <div className={classes.label} style={labelStyle}>{label}</div>
            }   
        </div>
    )
}
export function ListGroupItem2({image,icon,label,mini,medium,imageStyle={},containerStyle={},labelStyle={}}) {
    const classes = useStyles();
    return(

        <div className={clsx(classes.container)} style={containerStyle}>

            <div className={classes.label} style={labelStyle}>{label}</div>
           
            {
                image && 
                <img 
                    src={image} 
                    className={clsx(classes.image,classes.image2,{
                        [classes.mini] : mini,
                        [classes.medium] : medium,
                    })} 
                    style={imageStyle} 
                />
            }
            
            {icon}
              
        </div>
    )
}

