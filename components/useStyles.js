import { makeStyles } from '@material-ui/core/styles'

export function useMainStyles()
{
    return makeStyles((theme) => ({
        '@global': {
          ul: {
            margin: 0,
            padding: 0,
            listStyle: 'none',
          },
        },
        tutorial: {
            paddingTop: '80px'
        },
        main: {
          //color: '#3f50b5',
          backgroundSize: 'cover !important',
          backgroundPosition: 'center !important'
        },
        laptop: {
          background: 'linear-gradient(0deg, rgba(255,255,255,1) 28%, #2c387e 28%)',
          color: '#fff',
        },
        root: {
          flexGrow: 1,
        },
        paper: {
          padding: theme.spacing(1),
          textAlign: 'center',
          color: theme.palette.text.secondary,
        },
        colorPrimary : {
          color: theme.palette.text.primary
        },
        toolbar: {
          flexWrap: 'wrap',
          display: 'flex',
          justifyContent: 'space-between !important'
        },
        toolbarTitle: {
          flexGrow: 1,
        },
        link: {
          margin: theme.spacing(1, 1.5),
          fontWeight: '100'
        },
        heroContent: {
          padding: theme.spacing(8, 0, 6),
          marginTop: '100px'
        },
        cardHeader: {
          backgroundColor:
            theme.palette.type === 'light' ? theme.palette.grey[200] : theme.palette.grey[700],
        },
        cardPricing: {
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'baseline',
          marginBottom: theme.spacing(2),
        },
        footer: {
          borderTop: `1px solid ${theme.palette.divider}`,
          marginTop: theme.spacing(8),
          paddingTop: theme.spacing(3),
          paddingBottom: theme.spacing(3),
          [theme.breakpoints.up('sm')]: {
            paddingTop: theme.spacing(6),
            paddingBottom: theme.spacing(6),
          },
        },
        media: {
          padding: '25px',
          display: 'grid',
          placeItems: 'center'
        }
      }));
}