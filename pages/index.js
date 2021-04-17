import React, { useEffect } from 'react'
import Button from '@material-ui/core/Button'
import Card from '@material-ui/core/Card'
import CardActions from '@material-ui/core/CardActions'
import CardContent from '@material-ui/core/CardContent'
import CardHeader from '@material-ui/core/CardHeader'
import Grid from '@material-ui/core/Grid'
import StarIcon from '@material-ui/icons/StarBorder'
import Typography from '@material-ui/core/Typography'
import Link from '../src/Link'
import Container from '@material-ui/core/Container'
import { Box } from '@material-ui/core'
import CheckIcon from '@material-ui/icons/Check'
import KeyboardArrowRightIcon from '@material-ui/icons/KeyboardArrowRight'
import { Default } from '../components/layout/Default'
import CssBaseline from '@material-ui/core/CssBaseline'
import { useMainStyles } from '../components/useStyles'
import { Tutorial } from '../components/block/index/Tutorial'
import SmoothScroll from 'smooth-scroll/dist/smooth-scroll'
import GroupAddIcon from '@material-ui/icons/GroupAdd'


const tiers = [
  {
      title: 'Free',
      price: '0',
      description: ['10 users included', '2 GB of storage', 'Help center access', 'Email support'],
      buttonText: 'Sign up for free',
      buttonVariant: 'outlined'
  },
  {
      title: 'Pro',
      subheader: 'Most popular',
      price: '15',
      description: [
          '20 users included',
          '10 GB of storage',
          'Help center access',
          'Priority email support',
      ],
      buttonText: 'Get started',
      buttonVariant: 'contained'
  },
  {
      title: 'Enterprise',
      price: '30',
      description: [
          '50 users included',
          '30 GB of storage',
          'Help center access',
          'Phone & email support',
      ],
      buttonText: 'Contact us',
      buttonVariant: 'outlined'
  }
]


export default function IndexPage() 
{

  const Title = 'Shop me | Бизнес партнёрство'
  const useStyles = useMainStyles()
  const classes = useStyles()

  useEffect(() => {
		const scroll = new SmoothScroll('a[href*="#"]', {
			speed: 1000,
			speedAsDuration: true,
			updateURL: false
		})
	}, [])

  return (
    <>
      <Default title={Title} classes={classes}>
        <CssBaseline />
        
        <Container maxWidth="xl" component="main" className={classes.main} style={{ background: 'url(/img/home1.jpg) no-repeat #cfe8fc' }}>
          <Grid
            container
            direction="row"
            justify="space-between"
            alignItems="center"
            style={{height: '100vh'}}
          >
            <Container maxWidth="lg">
              <Grid item xs={12} sm={6}>
                <Box p={3}>
                  <Box pb={4}>
                    <p>
                      <mark>
                        <GroupAddIcon className="mark_affiliate" /> Affiliate program for doing business and transactions
                      </mark>
                    </p>
                    <Typography variant="h3" colorprimary gutterBottom align="left">
                        Партнёрская программа
                    </Typography>
                    <Typography variant="p" gutterBottom align="left">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                    </Typography> 
                  </Box>
                  <Box>
                    <Grid container direction="row">
                      <Grid item xs={12} md={5}>
                        <Button variant="contained" component={Link} href="/about" noLinkStyle size="large" color="secondary">
                            <CheckIcon /> &#160;Try all на 30 дней
                        </Button>                    
                      </Grid>
                      <Grid item xs={12} md={7}>
                        <a data-scroll className="MuiLink-underlineNone" href="#learn_more">
                          <Button variant="outlined" size="large" color="primary">
                            <KeyboardArrowRightIcon /> &#160;Learn More
                          </Button>                           
                        </a>
                      </Grid>
                    </Grid>
                  </Box>
                </Box>
              </Grid>
              <Grid item xs={12} sm={6} />            
            </Container>
          </Grid>
        </Container>

        <Tutorial classes={classes} />

        <Container maxWidth="sm" component="main" className={classes.heroContent}>
          <Typography component="h1" variant="h2" align="center" color="textPrimary" gutterBottom>
            Pricing
          </Typography>
          <Typography variant="h5" align="center" color="textSecondary" component="p">
            Quickly build an effective pricing table for your potential customers with this layout.
            It&apos;s built with default Material-UI components with little customization.
          </Typography>
        </Container>

        <Container maxWidth="md" component="main">
          <Grid container spacing={5} alignItems="flex-end">
            {tiers.map((tier) => (
              <Grid item key={tier.title} xs={12} sm={tier.title === 'Enterprise' ? 12 : 6} md={4}>
                <Card>
                  <CardHeader
                    title={tier.title}
                    subheader={tier.subheader}
                    titleTypographyProps={{ align: 'center' }}
                    subheaderTypographyProps={{ align: 'center' }}
                    action={tier.title === 'Pro' ? <StarIcon /> : null}
                    className={classes.cardHeader}
                  />
                  <CardContent>
                    <div className={classes.cardPricing}>
                      <Typography component="h2" variant="h3" color="textPrimary">
                        ${tier.price}
                      </Typography>
                      <Typography variant="h6" color="textSecondary">
                        /mo
                      </Typography>
                    </div>
                    <ul>
                      {tier.description.map((line) => (
                        <Typography component="li" variant="subtitle1" align="center" key={line}>
                          {line}
                        </Typography>
                      ))}
                    </ul>
                  </CardContent>
                  <CardActions>
                    <Button fullWidth variant={tier.buttonVariant} color="primary">
                      {tier.buttonText}
                    </Button>
                  </CardActions>
                </Card>
              </Grid>
            ))}
          </Grid>
        </Container>
      </Default>      
    </>
  );
}