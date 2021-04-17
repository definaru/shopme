import React, { useState, useEffect } from 'react'
import AppBar from '@material-ui/core/AppBar'
import Button from '@material-ui/core/Button'
import Toolbar from '@material-ui/core/Toolbar'
import Typography from '@material-ui/core/Typography'
import Link from '../../../src/Link'
import ExitToAppIcon from '@material-ui/icons/ExitToApp'
import IconButton from '@material-ui/core/IconButton'


export function Header({classes})
{
    const [scrollposition, setScrollposition] = useState(0)
  
    useEffect(() => {
        const Scroll = () => setScrollposition(window.scrollY)
        window.addEventListener('scroll', Scroll, false)
        if(scrollposition == 0) {
            window.removeEventListener('scroll', Scroll, true)
        }
    }, [scrollposition])
  
    const position = 80
  
    const CustomMenu = () => {
        return scrollposition > position ? "inherit" : "primary"
    }

    return (
        <AppBar 
            position="fixed" 
            color='primary'
            elevation={0} 
            className={classes.appBar} 
            style={scrollposition > position ? {} : { background: 'transparent'}}
        >
            <Toolbar 
                className={classes.toolbar} 
                style={{ padding: scrollposition > position ? '0 75px' :'25px 75px'}}
            >
            <div>
                <Typography variant="h6" color="inherit" noWrap className={classes.toolbarTitle}>
                    <Link variant="h4" color={CustomMenu()} className="logo" href="/">
                        <IconButton>
                            <img src="/img/logo.png" style={{width: '40px'}} alt="Shop Me" />
                        </IconButton>
                        <IconButton color="inherit">
                            Shop Me
                        </IconButton>
                    </Link>
                </Typography>
            </div>
            <div>
                <nav>
                    <Link variant="button" underline="none" color={CustomMenu()} href="/about" className={classes.link}>
                        О нас
                    </Link>
                    <Link variant="button" underline="none" color={CustomMenu()} href="/product" className={classes.link}>
                        Продукты
                    </Link>
                    <Link variant="button" underline="none" color={CustomMenu()} href="#" className={classes.link}>
                        Преимущество
                    </Link>
                    <Link variant="button" underline="none" color={CustomMenu()} href="#" className={classes.link}>
                        Документация
                    </Link>
                    <Link variant="button" underline="none" color={CustomMenu()} href="#" className={classes.link}>
                        Поддержка
                    </Link>
                </nav>
            </div>
            <div>
                <Button href="#" color="inherit" variant="contained" className={classes.link}>
                    <img src="/img/flags/en.svg" alt="en" style={{width: '29px'}} />
                </Button>
                <Button href="#" color="secondary" variant="contained" className={classes.link}>
                    <ExitToAppIcon /> &#160;Sign In
                </Button>
            </div>
            </Toolbar>
        </AppBar>
    )
}