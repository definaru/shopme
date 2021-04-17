import * as React from 'react'
import Container from '@material-ui/core/Container'
import Typography from '@material-ui/core/Typography'
import Button from '@material-ui/core/Button'
import Link from '../src/Link'
import Grid from '@material-ui/core/Grid'
import { Box } from '@material-ui/core'
import { useMainStyles } from '../components/useStyles'
import { Default } from '../components/layout/Default'
import KeyboardArrowRightIcon from '@material-ui/icons/KeyboardArrowRight'
import Card from '@material-ui/core/Card'
import CardHeader from '@material-ui/core/CardHeader'


export default function ProductPage() 
{
    const Title = 'Наши продукты'
    const useStyles = useMainStyles()
    const classes = useStyles()

    const List = [
        {
            img: '/img/gelstore.png',
            title: 'Gel.Store',
            subheader: 'Connect your store, import your products, then send us your inventory.',
            buttonText: 'Sign up for free'
        },
        {
            img: '/img/react_page.png',
            title: 'React Page',
            subheader: 'We store your inventory in any combination of our fulfillment centers.',
            buttonText: 'Get started'
        },
        {
            img: '/img/defina.png',
            title: 'Defina',
            subheader: 'We store your inventory in any combination of our fulfillment centers.',
            buttonText: 'Get started'
        },
        {
            img: '/img/defina_store.png',
            title: 'Defina Store',
            subheader: 'As soon as a customer places an order, we ship it from the nearest fulfillment center.',
            buttonText: 'Contact us'
        },
    ]


    return (
        <Default title={Title} classes={classes}>
            <Container maxWidth="lg" component="main" className={classes.main}>
                <Grid
                    container
                    direction="row"
                    justify="space-between"
                    alignItems="center"
                    style={{height: '100vh'}}
                >
                    <Grid item xs={6}>
                        <Box p={3}>
                            <Box pb={4}>
                                <p><mark>{Title}</mark></p>
                                <Typography variant="h3" colorprimary gutterBottom align="left">
                                    Список программ
                                </Typography>
                                <Typography variant="p" gutterBottom align="left">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                </Typography> 
                            </Box>
                            <Box>
                                <Grid container direction="row">
                                    <a data-scroll className="MuiLink-underlineNone" href="#more">
                                        <Button variant="contained" size="large" color="secondary">
                                            <KeyboardArrowRightIcon /> &#160;Подробнее
                                        </Button>                           
                                    </a>
                                </Grid>
                            </Box>
                        </Box>
                    </Grid>
                    <Grid item xs={6} align="right">
                        <img src="/img/processing.svg" style={{width: '90%', padding: '60px 79px 0px 0px'}} alt="Our Production" />
                    </Grid>
                </Grid>
            </Container>


            <section style={{padding: '100px 0', background: '#fdfdfd'}} id="more">
                <Container maxWidth="lg" component="div" className={classes.tutorial}>
                    <Grid container spacing={4} alignItems="flex-end">
                        {List.map((tier, idx) => (
                        <Grid item key={idx} xs={12} sm={4} md={4}>
                            <Card raised={true}>
                                <Box p={3} mb={3}>
                                    <div className={classes.media}>
                                        <img src={tier.img} style={{height: '200px'}} />
                                    </div>
                                    <CardHeader
                                        title={tier.title}
                                        subheader={tier.subheader}
                                        titleTypographyProps={{ align: 'center' }}
                                        subheaderTypographyProps={{ align: 'center' }}
                                    />
                                </Box>
                            </Card>
                        </Grid>
                        ))}
                    </Grid>
                </Container>
            </section>
        </Default>
    )
}
