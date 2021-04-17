import * as React from 'react'
import Container from '@material-ui/core/Container'
import Typography from '@material-ui/core/Typography'
import { Box } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import ProTip from '../src/ProTip'
import Link from '../src/Link'
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
      <Container maxWidth="xl" component="main" className={classes.main}>
        <Grid
          container
          direction="row"
          justify="space-between"
          alignItems="center"
          style={{height: '100vh'}}
        >
          <Container maxWidth="lg">
            <Box sx={{ my: 4 }} mt={12}>
              <Typography variant="h4" component="h1" gutterBottom>
                Next.js v5-alpha example
              </Typography>
              <Button variant="contained" component={Link} noLinkStyle href="/">
                Go to the main page
              </Button>
              <ProTip />
            </Box>              
          </Container>
        </Grid>
      </Container>
    </Default>
  )
}
