import React from 'react';
import { makeStyles } from '@material-ui/core';
import dateFormat from "dateformat";
import {Link, useHistory} from 'react-router-dom';

const useStyles = makeStyles(theme=>({
    prop:{
        color:'#333'
    }
}));



export default function Sidebar({club}) {
    const classes =useStyles();
    const history = useHistory();

    return (
        <div>
            <div>
                <img src={club.logo} />
            </div>

            <div>
                <div>
                    <div className={classes.prop}>
                        <h2>{club.name}</h2>
                        <p>Football Club</p>
                    </div>
                    <div className="prop">
                        <h5>Established In</h5>
                        <p>{dateFormat(club.establishedIn,'mmmm yy')}</p>
                    </div>
                </div>

                <div className="prop">
                        <h5>Tournaments</h5>
                        <ul>
                            {
                                club.tournaments.map(tournament=>(
                                    <li>{tournament.name}</li>
                                ))
                            }
                        </ul>
                </div>

                <div className={classes.prop}>
                    <h5>Owner</h5>
                    <p>{club.owner.name}</p>
                </div>
                <div className={classes.prop}>
                    <h5>Owner Id</h5>
                    <p>{club.owner_id}</p>
                </div>
                <div className={classes.prop}>
                    <h5>Location</h5>
                    <p>Dhaka,Bangladesh</p>
                </div>
                <div className={classes.prop}>
                    <h5>Contact</h5>
                    <a target="_blank" href={`http://${club.owner.fbID}`}>
                        <img src='/images/logo/fblogo.png' style={{height:30}}/>
                    </a>
                    
                </div>
            </div>
        </div>
    )
}
