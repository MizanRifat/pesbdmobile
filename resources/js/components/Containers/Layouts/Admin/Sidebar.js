import React, { useState,useEffect } from 'react';
import styles from "@assets/jss/material-dashboard-react/components/sidebarStyle";
import { makeStyles } from "@material-ui/core/styles";
import SideBarImage from '@assets/img/sidebar-2.jpg';
import logo from "@assets/img/reactlogo.png";
import MyList from './MyList'


const useStyles = makeStyles(styles);


export default function Sidebar() {

    const classes = useStyles();

 

    const brand = (
        <div className={classes.logo}>
          <a
            href="/admin"
            className={classes.logoLink}
            target="_blank"
          >
            <div className={classes.logoImage}>
              <img src={logo} alt="logo" className={classes.img} />
            </div>
            Mizan Rifat
          </a>
        </div>
      );


      

     


    return (
        <div> 
            {brand} 
            <MyList/>
            <div style={{ backgroundImage: "url(" + SideBarImage + ")"}} />
        </div>
    )
}
