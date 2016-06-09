/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
            'roboto, sans-serif': '<script src=\"http://use.edgefonts.net/roboto:n9,i9,n7,i7,i4,n3,i3,n5,i5,n4,n2,i2:all.js\"></script>'        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "width",
                centerStage: "both",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'Ellipse',
                            type: 'ellipse',
                            rect: ['234px', 'auto', '82px', '8px', 'auto', '196px'],
                            borderRadius: ["5% 15%", "5% 15%", "5% 15%", "5% 15%"],
                            opacity: '1',
                            fill: ["rgba(46,204,113,1.00)"],
                            stroke: [0,"rgba(0,0,0,1)","none"]
                        },
                        {
                            id: 'Text',
                            type: 'text',
                            rect: ['103px', '173px', '264px', '48px', 'auto', 'auto'],
                            clip: 'rect(0px 264px 48px 180px)',
                            text: "<p style=\"margin: 0px; text-align: left;\">​<span style=\"font-family: roboto, sans-serif; top: 90px;\">Requested Pass</span><span style=\"font-size: 35px; font-family: roboto, sans-serif; top: 90px;\">​</span></p>",
                            font: ['Arial, Helvetica, sans-serif', [24, ""], "rgba(0,0,0,1)", "normal", "none", "", "break-word", "normal"]
                        },
                        {
                            id: 'check',
                            type: 'image',
                            rect: ['251px', '224px', '48px', '48px', 'auto', 'auto'],
                            clip: 'rect(0px 48px -3px 0px)',
                            opacity: '1',
                            fill: ["rgba(0,0,0,0)",im+"check.svg",'0px','0px','100%','99.8%', 'no-repeat'],
                            transform: [[],['8'],[],['0','0']]
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: [undefined, undefined, '550px', '400px'],
                            sizeRange: ['','','',''],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,0.00)"]
                        }
                    }
                },
                timeline: {
                    duration: 3693.3365013867,
                    autoPlay: true,
                    data: [
                        [
                            "eid111",
                            "clip",
                            1280,
                            116,
                            "easeInCubic",
                            "${Text}",
                            [0,264,48,180],
                            [0,264,48,16],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid112",
                            "clip",
                            1396,
                            75,
                            "easeOutCubic",
                            "${Text}",
                            [0,264,48,16],
                            [0,264,48,-11],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid167",
                            "clip",
                            2711,
                            340,
                            "easeOutCubic",
                            "${Text}",
                            [0,264,48,-11],
                            [0,264,48,174],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid180",
                            "scaleY",
                            3380,
                            313,
                            "easeOutCubic",
                            "${Ellipse}",
                            '1',
                            '0'
                        ],
                        [
                            "eid22",
                            "bottom",
                            423,
                            374,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '196px',
                            '161px'
                        ],
                        [
                            "eid84",
                            "bottom",
                            1280,
                            0,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '161px',
                            '161px'
                        ],
                        [
                            "eid23",
                            "opacity",
                            250,
                            19,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '0',
                            '1'
                        ],
                        [
                            "eid69",
                            "skewX",
                            423,
                            0,
                            "easeInOutCubic",
                            "${check}",
                            '0deg',
                            '0deg'
                        ],
                        [
                            "eid202",
                            "clip",
                            698,
                            99,
                            "easeInCubic",
                            "${check}",
                            [0,48,-3,0],
                            [0,48,29,0],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid203",
                            "clip",
                            797,
                            114,
                            "easeOutCubic",
                            "${check}",
                            [0,48,29,0],
                            [0,48,52,0],
                            {valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'}
                        ],
                        [
                            "eid106",
                            "left",
                            1280,
                            191,
                            "easeInOutCubic",
                            "${Text}",
                            '103px',
                            '178px'
                        ],
                        [
                            "eid166",
                            "left",
                            2711,
                            340,
                            "easeOutCubic",
                            "${Text}",
                            '178px',
                            '108px'
                        ],
                        [
                            "eid81",
                            "border-top-right-radius",
                            1132,
                            169,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [70.3,70.3],
                            [29.3,29.3],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid94",
                            "border-top-right-radius",
                            1301,
                            170,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [29.3,29.3],
                            [5,15],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid148",
                            "border-top-right-radius",
                            2683,
                            368,
                            "easeOutCubic",
                            "${Ellipse}",
                            [5,15],
                            [67.8,67.8],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid79",
                            "border-bottom-left-radius",
                            1132,
                            169,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [70.3,70.3],
                            [29.3,29.3],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid92",
                            "border-bottom-left-radius",
                            1301,
                            170,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [29.3,29.3],
                            [5,15],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid146",
                            "border-bottom-left-radius",
                            2683,
                            368,
                            "easeOutCubic",
                            "${Ellipse}",
                            [5,15],
                            [67.8,67.8],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid175",
                            "scaleX",
                            3380,
                            313,
                            "easeOutCubic",
                            "${check}",
                            '1',
                            '0'
                        ],
                        [
                            "eid34",
                            "opacity",
                            911,
                            0,
                            "easeInOutCubic",
                            "${check}",
                            '1',
                            '1'
                        ],
                        [
                            "eid82",
                            "border-bottom-right-radius",
                            1132,
                            169,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [70.3,70.3],
                            [29.3,29.3],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid95",
                            "border-bottom-right-radius",
                            1301,
                            170,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [29.3,29.3],
                            [5,15],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid149",
                            "border-bottom-right-radius",
                            2683,
                            368,
                            "easeOutCubic",
                            "${Ellipse}",
                            [5,15],
                            [67.8,67.8],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid179",
                            "scaleX",
                            3380,
                            313,
                            "easeOutCubic",
                            "${Ellipse}",
                            '1',
                            '0'
                        ],
                        [
                            "eid50",
                            "rotateZ",
                            911,
                            0,
                            "easeInOutCubic",
                            "${check}",
                            '8deg',
                            '8deg'
                        ],
                        [
                            "eid19",
                            "height",
                            423,
                            374,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '8px',
                            '78px'
                        ],
                        [
                            "eid9",
                            "-webkit-transform-origin",
                            250,
                            0,
                            "linear",
                            "${Ellipse}",
                            [50,50],
                            [50,50],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid836",
                            "-moz-transform-origin",
                            250,
                            0,
                            "linear",
                            "${Ellipse}",
                            [50,50],
                            [50,50],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid837",
                            "-ms-transform-origin",
                            250,
                            0,
                            "linear",
                            "${Ellipse}",
                            [50,50],
                            [50,50],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid838",
                            "msTransformOrigin",
                            250,
                            0,
                            "linear",
                            "${Ellipse}",
                            [50,50],
                            [50,50],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid839",
                            "-o-transform-origin",
                            250,
                            0,
                            "linear",
                            "${Ellipse}",
                            [50,50],
                            [50,50],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid840",
                            "transform-origin",
                            250,
                            0,
                            "linear",
                            "${Ellipse}",
                            [50,50],
                            [50,50],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid176",
                            "scaleY",
                            3380,
                            313,
                            "easeOutCubic",
                            "${check}",
                            '1',
                            '0'
                        ],
                        [
                            "eid108",
                            "top",
                            1280,
                            0,
                            "easeInOutCubic",
                            "${Text}",
                            '173px',
                            '173px'
                        ],
                        [
                            "eid109",
                            "top",
                            1471,
                            0,
                            "easeInOutCubic",
                            "${Text}",
                            '173px',
                            '173px'
                        ],
                        [
                            "eid80",
                            "border-top-left-radius",
                            1132,
                            169,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [70.3,70.3],
                            [29.3,29.3],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid93",
                            "border-top-left-radius",
                            1301,
                            170,
                            "easeInOutCubic",
                            "${Ellipse}",
                            [29.3,29.3],
                            [5,15],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid147",
                            "border-top-left-radius",
                            2683,
                            368,
                            "easeOutCubic",
                            "${Ellipse}",
                            [5,15],
                            [67.8,67.8],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid70",
                            "skewY",
                            423,
                            0,
                            "easeInOutCubic",
                            "${check}",
                            '0deg',
                            '0deg'
                        ],
                        [
                            "eid20",
                            "width",
                            423,
                            374,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '8px',
                            '80px'
                        ],
                        [
                            "eid89",
                            "width",
                            1280,
                            191,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '80px',
                            '374px'
                        ],
                        [
                            "eid160",
                            "width",
                            2683,
                            368,
                            "easeOutCubic",
                            "${Ellipse}",
                            '374px',
                            '82px'
                        ],
                        [
                            "eid58",
                            "left",
                            911,
                            0,
                            "easeInOutCubic",
                            "${check}",
                            '251px',
                            '251px'
                        ],
                        [
                            "eid91",
                            "left",
                            1280,
                            191,
                            "easeInOutCubic",
                            "${check}",
                            '251px',
                            '107px'
                        ],
                        [
                            "eid163",
                            "left",
                            2683,
                            368,
                            "easeOutCubic",
                            "${check}",
                            '107px',
                            '251px'
                        ],
                        [
                            "eid21",
                            "left",
                            423,
                            374,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '271px',
                            '235px'
                        ],
                        [
                            "eid85",
                            "left",
                            1280,
                            191,
                            "easeInOutCubic",
                            "${Ellipse}",
                            '235px',
                            '88px'
                        ],
                        [
                            "eid159",
                            "left",
                            2683,
                            368,
                            "easeOutCubic",
                            "${Ellipse}",
                            '88px',
                            '234px'
                        ],
                        [
                            "eid197",
                            "top",
                            698,
                            154,
                            "easeInCubic",
                            "${check}",
                            '224px',
                            '173px'
                        ],
                        [
                            "eid198",
                            "top",
                            852,
                            59,
                            "easeOutCubic",
                            "${check}",
                            '173px',
                            '176px'
                        ],
                        [
                            "eid60",
                            "top",
                            911,
                            140,
                            "easeInOutCubic",
                            "${check}",
                            '176px',
                            '183px'
                        ],
                        [
                            "eid63",
                            "top",
                            1051,
                            81,
                            "easeInOutCubic",
                            "${check}",
                            '183px',
                            '176px'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("Confirm_edgeActions.js");
})("EDGE-193763827");
