import React, { useState,useEffect } from 'react';
import {MenuItem,FormControl,Select,makeStyles,Input} from '@material-ui/core';


const useStyles = makeStyles(theme=>({
    formControl: {
        '&.MuiInputBase-root':{
            fontSize:'unset'
        },
    },
    textField:{
        '&.MuiInputBase-root':{
            fontSize:'14px'
        }
    },
}));

export default function SelectDate({props}) {
    const classes = useStyles();

    const handleChange = (e)=>{
        props.onChange(e.target.value)
    }
    
    return (

            <Input
                type="datetime-local"
                defaultValue={props.value}
                name='date'
                className={classes.textField}
                onChange={handleChange}
                InputLabelProps={{
                shrink: true,
                }}
                style={{fontSize:'14px'}}
            />
    )
}
