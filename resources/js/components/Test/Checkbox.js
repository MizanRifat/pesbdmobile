import React,{useState, useEffect} from 'react'
import { Button, makeStyles } from '@material-ui/core'
import Notification from "react-web-notification";

const useStyles = makeStyles(theme=>({

}))

export default function Checkbox() {

  const classes = useStyles();

  const [notificationTitle, setNotificationTitle] = useState('')

  return (
    <div>
      <Button onClick={()=>setNotificationTitle('hey')}>click</Button>
      {notificationTitle ? (
        <Notification
          title={notificationTitle}
          options={{
            icon:
              "http://mobilusoss.github.io/react-web-notification/example/Notifications_button_24.png"
          }}
          onClose={() => setNotificationTitle(undefined)}
        />
      ) : null}
    </div>
  )
}
