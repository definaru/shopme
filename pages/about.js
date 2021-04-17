import * as React from 'react'
import Container from '@material-ui/core/Container'
import Typography from '@material-ui/core/Typography'
import { Box } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import KeyboardArrowRightIcon from '@material-ui/icons/KeyboardArrowRight'
import Grid from '@material-ui/core/Grid'
import { useMainStyles } from '../components/useStyles'
import { Default } from '../components/layout/Default'


export default function AboutPage() 
{
  const Title = 'О нашей компании'
  const useStyles = useMainStyles()
  const classes = useStyles()

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
                                История появления программы
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
                    <img 
                      src="/img/shopping.svg" 
                      style={{
                        width: '90%', 
                        padding: '60px 79px 0px 0px'
                      }} 
                      alt="Our Production" 
                    />
                </Grid>
            </Grid>
        </Container>
    </Default>
  )
}
