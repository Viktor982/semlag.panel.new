function safeCSSId(name) {
    return name.replace(/[^a-z0-9]/g, function(s) {
        var c = s.charCodeAt(0);
        if (c == 32) return '-';
        if (c >= 65 && c <= 90) return '_' + s.toLowerCase();
        return '__' + ('000' + c.toString(16)).slice(-4);
    });
}

String.prototype.safeCSSId = function() {
    return encodeURIComponent(
        this.toLowerCase()
    ).replace(/%[0-9A-F]{2}/gi,'');
};

// Hash any string into an integer value
// Then we'll use the int and convert to hex.
function hashCode(str) {
    var hash = 0;
    for (var i = 0; i < str.length; i++) {
        hash = str.charCodeAt(i) + ((hash << 5) - hash);
    }
    return hash;
}

// Convert an int to hexadecimal with a max length
// of six characters.
function intToARGB(i) {
    var hex = ((i>>24)&0xFF).toString(16) +
        ((i>>16)&0xFF).toString(16) +
        ((i>>8)&0xFF).toString(16) +
        (i&0xFF).toString(16);
    // Sometimes the string returned will be too short so we
    // add zeros to pad it out, which later get removed if
    // the length is greater than six.
    hex += '000000';
    return hex.substring(0, 6);
}

// Extend the string type to allow converting to hex for quick access.
String.prototype.toHexColour = function() {
    return intToARGB(hashCode(this));
};

function randomString(length) {
    return Math.round((Math.pow(36, length + 1) - Math.random() * Math.pow(36, length))).toString(36).slice(1);
}