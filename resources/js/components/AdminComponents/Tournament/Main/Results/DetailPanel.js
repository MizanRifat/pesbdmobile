import React,{useEffect} from 'react'
import EventPanel from './EventPanel'
import RatingsPanel from './RatingsPanel';
import Progress from '@customComponent/Progress';
import {makeStyles} from '@material-ui/core';
import { useSelector,useDispatch } from 'react-redux';
import { fetchFixture } from '@ducks/UpdateResultDuck';

const useStyles=makeStyles(theme=>({
    container:{
        padding:'10px',
        background:'#eee',
        minHeight:200
    }
}))


export default function DetailPanel({id}) {
    const classes = useStyles();
    
    const {
        fixture,
        loading,
        fetching,
    } = useSelector(state => state.updateResult)


    const dispatch = useDispatch()

    

    useEffect(()=>{
        dispatch(fetchFixture(id))
        .catch(err=>{
            history.push('/error')
            return;
        })
        
    },[])
    return (
        <>
       
            <div className={classes.container}>
                {
                
                    fetching ? 
                        
                    <Progress style={{top:'unset'}}/>
                        
                    :
                    <>
                        <EventPanel />
                        <RatingsPanel />
                    </>
                }
            </div>
        </>
    )
}
