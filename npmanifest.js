var through = require('through2');
var gutil = require('gulp-util');
var PluginError = gutil.PluginError;
var fs = require('fs');
var path = require('path');
const PLUGIN_NAME = 'npmanifest';

function npManifest(original) {
    var stream = through.obj(function(file, enc, cb) {
        var renamed = path.basename(file.path)
        var manifestDir = path.join(path.dirname(file.path), original+'.npmanifest.json')
        var manifest = {'file' : renamed}
        var _this1 = this
        fs.writeFile(manifestDir, JSON.stringify(manifest), function (err) {
            if(! err){
                _this1.push(file)
                cb()
            }
        })
    });
    return stream
}

module.exports = npManifest
