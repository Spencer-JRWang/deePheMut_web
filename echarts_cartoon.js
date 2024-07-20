var dom = document.getElementById('container_a');
        var myChart = echarts.init(dom, null, {
            renderer: 'canvas',
            useDirtyRect: false
        });
        var app = {};

        var option;

        option = {
            graphic: {
                elements: [
                    {
                        type: 'text',
                        right: 'center',
                        top: '10%',
                        style: {
                            text: 'deePheMut',
                            fontSize: 65,
                            fontWeight: 'bold',
                            lineDash: [0, 150],
                            lineDashOffset: 0,
                            fill: 'transparent',
                            stroke: '#1f77b4',
                            lineWidth: 1
                        },
                        keyframeAnimation: {
                            duration: 7000,
                            loop: true,
                            keyframes: [
                                {
                                    percent: 0.7,
                                    style: {
                                        fill: 'transparent',
                                        lineDashOffset: 200,
                                        lineDash: [200, 0]
                                    }
                                },
                                {
                                    // Stop for a while.
                                    percent: 0.8,
                                    style: {
                                        fill: 'transparent'
                                    }
                                },
                                {
                                    percent: 1,
                                    style: {
                                        fill: '#1f77b4'
                                    }
                                }
                            ]
                        }
                    }
                ]
            }
        };

        if (option && typeof option === 'object') {
            myChart.setOption(option);
        }

        window.addEventListener('resize', myChart.resize);