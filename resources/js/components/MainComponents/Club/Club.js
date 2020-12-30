import React, { useEffect, useState } from 'react'
import { Grid, Container } from '@material-ui/core'
import Sidebar from './Sidebar'
import SquadList from './SquadList';
import { useSelector,useDispatch } from 'react-redux';
import { Link } from 'react-router-dom';
import { sendApproveRequest } from '../../Redux/Ducks/ClubDuck';
import Progress from '../../CustomComponent/Progress';
import Notify from '../../CustomComponent/Notify';
import { fetchClub } from '../../Redux/Ducks/ClubDuck';


export default function Club(props) {

    const {club,fetching,loading} = useSelector(state => state.club);
    const {user} = useSelector(state => state.sessionUser);
    const dispatch = useDispatch()
    const [stateLoading, setStateLoading] = useState(fetching)
    const toast = Notify();

    const slug=props.match.params.slug;

    const handleSendApprovalReq = () => {
        dispatch(sendApproveRequest(club.id))
        .then(response=>{
            console.log({response})
            toast(response,'success')
        })
        .catch(error=>{
            console.log({error})
            toast(error.message,'error')
        })

    }

    useEffect(() => {
        dispatch(fetchClub(slug))
        .then(res=>{
            setStateLoading(false)
        })
    }, [slug])



    return (
        <Container>
            {
                stateLoading ? 

                    <Progress size={30} />
                
                    :
            
                    <Grid container spacing={3} className='mt-5'>
                        <Grid item xs={12} sm={4}>
                            <Sidebar club={club}/>
                        </Grid>
                        <Grid item xs={12} md={8}>
                            <SquadList club={club} />

                            {
                                club.owner.id === user.id &&
                                <>
                            
                                    {
                                        club.approved == 0 &&
                                    
                                        <div style={{padding:'15px'}}>
                                            <Link onClick={handleSendApprovalReq}>Send request to approve club.</Link>
                                        </div>
                                    }
                                    {
                                        club.approved == 2 &&
                                    
                                        <div style={{padding:'15px'}}>
                                            <div style={{color:'cadetblue'}}>Approval request sent.</div>
                                        </div>
                                    }
                                </>
                            }
                        </Grid>
                    </Grid>
            }
        </Container>
    )
}
