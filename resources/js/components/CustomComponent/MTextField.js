import React,{useState, useEffect} from 'react'
import { makeStyles, withStyles } from '@material-ui/core'
import TextField from '@material-ui/core/TextField';

import InputLabel from '@material-ui/core/InputLabel';
import MenuItem from '@material-ui/core/MenuItem';
import FormControl from '@material-ui/core/FormControl';
import Select from '@material-ui/core/Select';

const useStyles = makeStyles(theme=>({

}))

const CssTextField = withStyles({
  root: {
    '& label.Mui-focused': {
      color: 'unset',
    },
    '& .MuiInput-underline': {
      '&:hover:not($disabled):not($focused):not($error):before': {
        borderBottom: "1px solid rgba(0, 0, 0, 0.42)"
      },
      "&&&&:hover:before": {
        borderBottom: "1px solid rgba(0, 0, 0, 0.42)"
      },
    },
    '& .MuiInput-underline:after': {
      borderBottomColor: 'unset',
    },
    '& .MuiInput-underline:after': {
        borderBottom:'unset'
    },
    '& .MuiOutlinedInput-root': {
      '& fieldset': {
        borderColor: 'unset',
      },
      '&:hover fieldset': {
        borderColor: 'unset',
      },
      '&.Mui-focused:after': {
        transform: 'unset',
      },
      '&.Mui-focused fieldset': {
        borderColor: 'unset',
      },
    },
  },
})(TextField);


export default function MTextField({label,value,type,editMode,handleChange}) {

  const classes = useStyles();

  return (
    <div>
      {
        editMode ?

        type == 'select' ? 

            <FormControl className={classes.formControl}>
                <InputLabel shrink id="demo-simple-select-placeholder-label-label">
                  Age
                </InputLabel>
                <Select
                    labelId="demo-simple-select-placeholder-label-label"
                    id="demo-simple-select-placeholder-label"
                    value={age}
                    onChange={handleChange}
                    displayEmpty
                    className={classes.selectEmpty}
                  >
                  <MenuItem value="">
                    <em>None</em>
                  </MenuItem>
                  <MenuItem value={10}>Ten</MenuItem>
                  <MenuItem value={20}>Twenty</MenuItem>
                  <MenuItem value={30}>Thirty</MenuItem>
                </Select>
            </FormControl> 

            :

            <TextField
              id="standard-read-only-input"
              label={label}
              defaultValue={value}
              
            />


        :
      
        <CssTextField
            id="standard-read-only-input"
            label={label}
            defaultValue={value}
            InputProps={{
              readOnly: true,
            }}
          />
      }
    </div>
  )
}
