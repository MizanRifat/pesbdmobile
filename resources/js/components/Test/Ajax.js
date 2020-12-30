import React,{useState,useEffect} from 'react'
import { Button } from '@material-ui/core'




export default function Ajax() {

    const url = `/api/test`
    const [state, setstate] = useState('')
    const data = {
        fixture_id : 142
    }
    useEffect(() => {
        axios.get(url)
        .then(response=>{
            console.log(response.data)
            setstate(response)
        }).catch(error=>{
            console.log(error.response.data)
        })
    }, [])
    
    // useEffect(() => {
    //     axios.get('/api/test')
    //     .then(response=>{
    //         console.log(response.data)
    //         setstate(response)
    //     }).catch(error=>{
    //         console.log(error.response.data)
    //     })
    // }, [])


    return (
        <div>
            {JSON.stringify(state)}
        </div>
     )
}
