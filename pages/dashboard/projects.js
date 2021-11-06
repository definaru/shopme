import React, { useState } from 'react'
import { MainLayout } from '../../components/layout/MainLayout'
import { FirstScreen } from '../../components/ui/page/FirstScreen'
import { Project } from '../../components/block/project/Project'


export default function Projects() 
{
    const Title = 'Проекты'
    const [open, setOpen] = useState(false)

    return (
        <MainLayout title={`${Title} | ShopMe`}>
            {open ? <Project func={setOpen} /> : <FirstScreen func={setOpen} />}
        </MainLayout>
    )
}
