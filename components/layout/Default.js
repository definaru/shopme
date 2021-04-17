import React from 'react'
import Head from 'next/head'
import { Footer } from './default/Footer'
import { Header } from './default/Header'


export function Default({ children, classes, title = 'Page' })
{

    return (
        <>
			<Head>
				<title>{title}</title>
			</Head>
            <Header classes={classes} />
            {children}
            <Footer classes={classes} />
        </>
    )
}