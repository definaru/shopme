import { createMuiTheme } from '@material-ui/core/styles'
import { red } from '@material-ui/core/colors'

const theme = createMuiTheme({
    palette: {
        primary: {
            light: '#757ce8',
            main: '#2c387e',
            dark: '#002884',
            contrastText: '#fff',
        },
        secondary: {
          main: '#ffc107',
        },
        error: {
          main: red.A400,
        },
        background: {
          default: '#fff',
        },
    },
})

export default theme
