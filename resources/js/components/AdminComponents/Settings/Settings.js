import React,{useState, useEffect} from 'react'
import { makeStyles } from '@material-ui/core'
import CompContainer from '@customComponent/CompContainer';
import MTextField from '@customComponent/MTextField';
import KeyValueComp from '../../CustomComponent/KeyValueComp';
import {useSelector} from 'react-redux'
import { updateGinfo } from '../../Redux/Ducks/GInfoDuck';
import PrimaryLayout from '../../CustomComponent/PrimaryLayout';

const useStyles = makeStyles(theme=>({

}))

export default function Settings() {

    const classes = useStyles();

    const [editMode, setEditMode] = useState(false)

    const {ginfo,loading} = useSelector(state=>state.gInfo)

    const [fields, setFields] = useState([])

    const [value, setvalue] = useState({})

    useEffect(() => {

        setvalue({
            season:ginfo.season,
            pre_season:ginfo.pre_season,
        })


        setFields([
            {
                title:'Season',
                name:'season',
                optionValue:'',
                type:'input',
                options:[]
            },
            {
                title:'Pre Season',
                name:'pre_season',
                optionValue:ginfo.pre_season,
                type:'select',
                options:{
                    true:'Yes',
                    false:'No',
                }
            },
        ])
        
    }, [ginfo])

    return (
        <div style={{padding:'10px'}}>
            <PrimaryLayout title="Settings" loading={ loading }>

                <div>
                    <KeyValueComp
                        fields={fields}
                        value={value}
                        initEditMode={false}
                        editMode={editMode}
                        setEditMode={setEditMode}
                        editable={true} 
                        saveAction={updateGinfo} 
                    />
                </div>
            </PrimaryLayout>
        </div>
    )
}
