import dynamic from 'next/dynamic'
import React, { useState } from 'react'
import { FiTrendingUp, FiTrendingDown } from 'react-icons/fi'


export function AnaliticsContent() 
{

    const Chart = dynamic(() => import("react-apexcharts"), { ssr: false })

    const [totalUsers, setTotalUsers] = useState({ 
        options: {
            chart: {
                width: '100%',
                height: '70%',
                type: 'line',
                toolbar: {
                    show: false
                },
            },
            grid: {
                show: false
            },
            colors: ['#db2777'],
            dataLabels: {
                enabled: false,               
            },
            stroke: {
                curve: 'smooth',
                width: 3,
                //colors: undefined,
            },
            yaxis: {
                show: false,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            xaxis: {
                type: 'category',
                categories: ["436346", "201809", "300912", "401919", "300914", "201899", "101196"],
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            tooltip: {
                shared: false,
                theme: 'dark',
                x: {
                    show: false,
                    formatter: function (val) {
                        return val + ' user`s'
                    }
                },
                y: {
                    show: false,
                    formatter: function (val) {
                        return val + " % "
                        // Math.abs(val)
                    }
                }
            },
        },
        series: [{
            name: 'TOTAL USERS',
            data: [20, 140, 128, 151, 142, 209, 200, 20, 140, 128, 151, 142, 209, 200]
        }]
    })

    const [sessions, setSessions] = useState({ 
        options: {
            chart: {
                width: '100%',
                height: '70%',
                type: 'line',
                toolbar: {
                    show: false
                },
            },
            grid: {
                show: false
            },
            colors: ['#db2777'],
            dataLabels: {
                enabled: false,               
            },
            stroke: {
                curve: 'smooth',
                width: 3,
                //colors: undefined,
            },
            yaxis: {
                show: false,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            xaxis: {
                type: 'category',
                categories: ["436346", "201809", "300912", "401919", "300914", "201899", "101196"],
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            tooltip: {
                shared: false,
                theme: 'dark',
                x: {
                    show: false,
                    formatter: function (val) {
                        return val + ' user`s'
                    }
                },
                y: {
                    show: false,
                    formatter: function (val) {
                        return val + " % "
                        // Math.abs(val)
                    }
                }
            },
        },
        series: [{
            name: 'SESSIONS',
            data: [151, 142, 209, 200, 20, 140, 20, 140, 128, 428, 151, 142, 209, 200]
        }]
    })

    const [avg, setAwg] = useState({ 
        options: {
            chart: {
                width: '100%',
                height: '70%',
                type: 'line',
                toolbar: {
                    show: false
                },
            },
            grid: {
                show: false
            },
            colors: ['#db2777'],
            dataLabels: {
                enabled: false,               
            },
            stroke: {
                curve: 'smooth',
                width: 3,
                //colors: undefined,
            },
            yaxis: {
                show: false,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            xaxis: {
                type: 'category',
                categories: ["436346", "201809", "300912", "401919", "300914", "201899", "101196"],
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            tooltip: {
                shared: false,
                theme: 'dark',
                x: {
                    show: false,
                    formatter: function (val) {
                        return val + ' user`s'
                    }
                },
                y: {
                    show: false,
                    formatter: function (val) {
                        return val + " % "
                        // Math.abs(val)
                    }
                }
            },
        },
        series: [{
            name: 'AVG. CLICK RATE',
            data: [140, 20, 140, 128, 151, 142, 209, 200, 20, 128, 151, 142, 209, 200]
        }]
    })

    const [pageviews, setPageviews] = useState({ 
        options: {
            chart: {
                width: '100%',
                height: '70%',
                type: 'line',
                toolbar: {
                    show: false
                },
            },
            grid: {
                show: false
            },
            colors: ['#db2777'],
            dataLabels: {
                enabled: false,               
            },
            stroke: {
                curve: 'smooth',
                width: 3,
                //colors: undefined,
            },
            yaxis: {
                show: false,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            xaxis: {
                type: 'category',
                categories: ["436346", "201809", "300912", "401919", "300914", "201899", "101196"],
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            tooltip: {
                shared: false,
                theme: 'dark',
                x: {
                    show: false,
                    formatter: function (val) {
                        return val + ' user`s'
                    }
                },
                y: {
                    show: false,
                    formatter: function (val) {
                        return val + " % "
                        // Math.abs(val)
                    }
                }
            },
        },
        series: [{
            name: 'PAGEVIEWS',
            data: [140, 128, 151, 142, 209, 200, 20, 140, 20, 128, 151, 142, 209, 200]
        }]
    })


    return (
        <div className="grid grid-cols-4 gap-5">
            <div className="p-4 bg-white rounded shadow-sm">
                <div className="flex flex-row">
                    <div className="w-2/4">
                        <p className="text-gray-400 font-thin text-md">TOTAL USERS</p>
                        <h4 className="text-2xl font-semibold text-gray-900 py-2">72,540</h4>                                    
                    </div>
                    <div className="w-2/4">
                        <Chart 
                            options={totalUsers.options} 
                            series={totalUsers.series} 
                            type={totalUsers.options.chart.type}
                            width={totalUsers.options.chart.width}
                            height={totalUsers.options.chart.height}
                        /> 
                    </div>
                </div>
                <small className="text-gray-400">
                    <span className="inline-block text-sm px-2 py-0 rounded bg-green-100 mr-2">
                        <small className="flex items-center gap-1 text-green-600">
                            <FiTrendingUp /> 12.5%
                        </small>
                    </span> from 70,104
                </small>
            </div>
            <div className="p-4 bg-white rounded shadow-sm">
                <div className="flex flex-row">
                    <div className="w-2/4">
                        <p className="text-gray-400 font-thin text-md">SESSIONS</p>
                        <h4 className="text-2xl font-semibold text-gray-900 py-2">29.4%</h4>                                    
                    </div>
                    <div className="w-2/4">
                        <Chart 
                            options={sessions.options} 
                            series={sessions.series} 
                            type={sessions.options.chart.type}
                            width={sessions.options.chart.width}
                            height={sessions.options.chart.height}
                        />
                    </div>
                </div>
                <small className="text-gray-400">
                    <span className="inline-block text-sm px-2 py-0 rounded bg-green-100 mr-2">
                        <small className="flex items-center gap-1 text-green-600">
                            <FiTrendingUp /> 1.7%
                        </small>
                    </span> from 29.1%
                </small>
            </div>
            <div className="p-4 bg-white rounded shadow-sm">
                <div className="flex flex-row">
                    <div className="w-2/4">
                        <p className="text-gray-400 font-thin text-md">CLICK RATE</p>
                        <h4 className="text-2xl font-semibold text-gray-900 py-2">56.8%</h4>                                    
                    </div>
                    <div className="w-2/4">
                        <Chart 
                            options={avg.options} 
                            series={avg.series} 
                            type={avg.options.chart.type}
                            width={avg.options.chart.width}
                            height={avg.options.chart.height}
                        />
                    </div>
                </div>
                <small className="text-gray-400">
                    <span className="inline-block text-sm px-2 py-0 rounded bg-red-100 mr-2">
                        <small className="flex items-center gap-1 text-red-600">
                            <FiTrendingDown /> 4.4%
                        </small>
                    </span> from 61.2%
                </small>
            </div>
            <div className="p-4 bg-white rounded shadow-sm">
                <div className="flex flex-row">
                    <div className="w-2/4">
                        <p className="text-gray-400 font-thin text-md">PAGEVIEWS</p>
                        <h4 className="text-2xl font-semibold text-gray-900 py-2">92,913</h4>                                    
                    </div>
                    <div className="w-2/4">
                        <Chart 
                            options={pageviews.options} 
                            series={pageviews.series} 
                            type={pageviews.options.chart.type}
                            width={pageviews.options.chart.width}
                            height={pageviews.options.chart.height}
                        />
                    </div>
                </div>
                <small className="text-gray-400">
                    <span className="inline-block text-sm px-2 py-0 rounded bg-gray-100 mr-2">
                        <small className="flex items-center gap-1 text-gray-600">
                            0.0%
                        </small>
                    </span> from 2,913
                </small>
            </div>
        </div>
    )
}
