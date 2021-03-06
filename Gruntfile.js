module.exports = function (grunt) {
    grunt.initConfig({
        browserify: {
            dist: {
                options: {
                    transform: [
                        ["babelify", {
                            compact: false
                        }]
                    ]
                },
                files: {
                    // if the source file has an extension of es6 then
                    // we change the name of the source file accordingly.
                    // The result file's extension is always .js
                    "./public/assets/dist/script/mobile.js": ["./public/assets/src/script/mobile.js"],
                    "./public/assets/dist/script/desktop.js": ["./public/assets/src/script/desktop.js"]
                }
            }
        },

        stylus: {
            options: {
                compress: true,
                use: [
                    require('kouto-swiss')
                ]
            },
            mobile: {
                files: {
                    './public/assets/dist/styles/app_mobile.css': './public/assets/src/stylus/app_mobile.styl'
                }
            },
            tablet: {
                files: {
                    './public/assets/dist/styles/app_tablet.css': './public/assets/src/stylus/app_tablet.styl'
                }
            },
            desktop: {
                files: {
                    './public/assets/dist/styles/app.css': './public/assets/src/stylus/app.styl'
                }
            }
        },

        image: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: './public/assets/src/img/',
                    src: ['**/*.{png,jpg,jpeg,gif,svg}'],
                    dest: './public/assets/dist/img/'
                }]
            }
        },

        uglify: {
            options: {
                compress: {
                    drop_console: true,
                },
                report: 'gzip',
                quoteStyle: 2, // always double quotes
            },
            dist: {
                files: {
                    './public/assets/dist/script/desktop.js': 'public/assets/dist/script/desktop.js',
                    './public/assets/dist/script/mobile.js': 'public/assets/dist/script/mobile.js'
                }
            }
        },

        notify_hooks: {
            options: {
                enabled: true,
                title: "L'oppure",
                success: true,
                duration: 3,
            }
        },

        watch: {
            scripts: {
                files: ["./public/assets/src/script/**/*.{js,jsx}"],
                tasks: ["browserify"]
            },
            styles: {
                files: ["./public/assets/src/stylus/**/*.styl"],
                tasks: ["stylus"]
            },
            // images: {
            //   files: ["./public/assets/src/img/**/*.{png,jpg,jpeg,gif,svg}"]
            // }
        }
    });

    grunt.loadNpmTasks("grunt-browserify");
    grunt.loadNpmTasks("grunt-contrib-stylus");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-image");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks('grunt-notify');

    grunt.registerTask("default", ["watch"]);
    grunt.registerTask("build", ["browserify", "stylus", "image"]);
    grunt.registerTask("optimize", ["browserify", "stylus", "image", "uglify"]);

    grunt.task.run('notify_hooks');
};
