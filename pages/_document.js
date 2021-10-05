import Document, { Html, Head, Main, NextScript } from 'next/document'
        
export default class MyDocument extends Document 
{
    render() {
        
        const palette = '#db2777'  

        return (
            <Html lang="en">
                <Head>
                    <meta name="author" content="Defina LLC" />
                    <meta name="theme-color" content={palette} />
                    <meta name="msapplication-navbutton-color" content={palette} />
                    <meta name="apple-mobile-web-app-status-bar-style" content={palette} />

                    <link href="/access/img/favicon-32x32.png" rel="icon" />
                    <link href="/access/img/favicon-32x32.png" rel="apple-touch-icon" />
                </Head>
                <body className="scroll">
                    <Main />
                    <NextScript />
                </body>
            </Html>
        )
    }
}