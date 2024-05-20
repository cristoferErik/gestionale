const {src,dest,watch}=require("gulp");
const sass = require("gulp-sass")(require('sass'));
function css(done){
    src('resources/css/**/*.scss')
        .pipe(sass())
        .pipe(dest('src/css'));
    done();
}

function devExecution(done){
    watch('resources/scss/**/*.scss',css);
    done();
}
exports.devExecution = devExecution;