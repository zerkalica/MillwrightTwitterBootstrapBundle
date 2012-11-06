#!/bin/sh

vendor=$(pwd)/Resources/public/vendor
[ -d $vendor ] || vendor=$(dirname $0)/Resources/public/vendor

recreate() {
    rm -rf $vendor
    mkdir -p $vendor
}

download() {
    cd $vendor
    git clone git://github.com/malsup/form.git
    git clone git://github.com/cloudhead/less.js.git
    git clone git://github.com/riklomas/quicksearch.git
    git clone git://github.com/lou/multi-select.git
    git clone git://github.com/harvesthq/chosen.git
    git clone git://github.com/jdewit/bootstrap-timepicker.git
    git clone git://github.com/dangrossman/bootstrap-daterangepicker.git
    git clone git://github.com/eternicode/bootstrap-datepicker.git
    git clone git://github.com/twitter/bootstrap.git
}

cleanup() {
    cd $vendor && \
    find . -type d -name '.git' -exec rm -rf {} \; 2> /dev/null

    cd $vendor/bootstrap && \
    rm * .* 2>/dev/null  && \
    rm -rf docs js/tests less/tests

    cd $vendor/bootstrap-datepicker && \
    rm * .* 2>/dev/null  && \
    rm -rf build tests css

    cd $vendor/bootstrap-timepicker && \
    rm * .* 2>/dev/null  && \
    rm -rf compiled

    cd $vendor/chosen && \
    rm * .* 2>/dev/null  && \
    rm -rf coffee && \
    rm chosen/chosen.proto.*

    cd $vendor/less.js && \
    rm -rf benchmark bin build lib test
    rm dist/less-1.1.* dist/less-1.2.* dist/less-1.3.0* dist/less-rhino-* dist/*.min.js

    cd $vendor/multi-select && \
    rm -rf test

    cd $vendor/quicksearch && \
    rm -rf examples
}

fix_img() {
    rm -rf $vendor/../custom/img
    cp -R $vendor/bootstrap/img $vendor/../custom/img
}

recreate
download
cleanup
fix_img
