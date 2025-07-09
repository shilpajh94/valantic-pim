#!/bin/bash


# Thanks, @pryser!

print_style () {
    [ -o xtrace ] && tracestate='set -o xtrace' || tracestate='set +o xtrace'
    set +o xtrace
    if [ "$2" == "info" ] ; then
        COLOR="36m"
    elif [ "$2" == "success" ] ; then
        COLOR="32m"
    elif [ "$2" == "warning" ] ; then
        COLOR="33m"
    elif [ "$2" == "error" ] ; then
        COLOR="31m"
    else #default color
        COLOR="0m"
    fi

    STARTCOLOR="\e[$COLOR"
    ENDCOLOR="\e[0m"

    printf "${STARTCOLOR}%b${ENDCOLOR}\n" "$1"
    eval "$tracestate"
}

print_style_bold () {
    [ -o xtrace ] && tracestate='set -o xtrace' || tracestate='set +o xtrace'
    set +o xtrace
    if [ "$2" == "info" ] ; then
        COLOR="46m"
    elif [ "$2" == "success" ] ; then
        COLOR="42m"
    elif [ "$2" == "warning" ] ; then
        COLOR="43m"
    elif [ "$2" == "error" ] ; then
        COLOR="41m"
    else #default color
        COLOR="0m"
    fi

    STARTCOLOR="\e[$COLOR"
    ENDCOLOR="\e[0m"

    printf "${STARTCOLOR}%b${ENDCOLOR}\n" "$1"
    eval "$tracestate"
}
