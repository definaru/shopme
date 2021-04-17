import React from 'react'
import Button from '@material-ui/core/Button'
import Card from '@material-ui/core/Card'
import CardHeader from '@material-ui/core/CardHeader'
import Grid from '@material-ui/core/Grid'
import Container from '@material-ui/core/Container'
import { Box } from '@material-ui/core'
import VisibilityIcon from '@material-ui/icons/Visibility'


export function Tutorial({classes}) 
{

    const Boxes = [
        {
            title: '1. Connect',
            subheader: 'Connect your store, import your products, then send us your inventory.',
            buttonText: 'Sign up for free'
        },
        {
            title: '2. Store',
            subheader: 'We store your inventory in any combination of our fulfillment centers.',
            buttonText: 'Get started'
        },
        {
            title: '3. Ship',
            subheader: 'As soon as a customer places an order, we ship it from the nearest fulfillment center.',
            buttonText: 'Contact us'
        },
    ]


    return (
        <section>
            <Container 
                maxWidth="xl" 
                component="main" 
                id="learn_more"
                className={classes.laptop}
            >
                <Grid
                    container
                    direction="row"
                    alignItems="center"
                    style={{height: '100vh'}}
                >
                    <Container maxWidth="lg">
                        <Grid item xs={12}>
                            <Grid container justify="center" spacing={2}>
                                <img 
                                    src="/img/laptop011.svg" 
                                    style={{
                                        width: '70%', 
                                        marginTop: '80px',
                                        marginBottom: '80px'
                                    }} 
                                    alt="Laptop" 
                                />
                            </Grid>            
                        </Grid>
                    </Container>
                </Grid>
            </Container>

            <Container id="tutorial" maxWidth="lg" component="main" className={classes.tutorial}>
                <Grid container spacing={4} alignItems="flex-end">
                    {Boxes.map((tier, idx) => (
                    <Grid item key={idx} xs={12} sm={4} md={4}>
                        <Card raised={true}>
                            <Box p={3} mb={3}>
                                <div className={classes.media}>
                                    <img src={`/img/home-sec1-${idx+1}.svg`} style={{height: '200px'}} />
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
                    <Grid container spacing={5} justify="center">
                        <Box mt={8}>
                            <Button variant="contained" size="large" color="primary">
                            &#160;&#160;<VisibilityIcon /> &#160;How it Works&#160;&#160;
                            </Button>
                        </Box>
                    </Grid>
                </Grid>
            </Container>
        </section>
    )
}
