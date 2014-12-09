#!/bin/bash
#
SHELL=/bin/sh
PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin
MAILTO=root

# Variables
TAG=$1
NAME=$2
PW=$3
BUSINESSID=$4
EMAIL=$5
BANKACCOUNT=$6

CRYPTED=$(python password_crypt.py ${PW})
DB=$TAG
TEMPLATE="console/commands/sql/template_default.sql"
INPUTFILE="/tmp/${DB}.sql"
BRURL="http://futurality.fi/ytj/index.php/site/index?company="

# Create temporary database dump file
cp $TEMPLATE $INPUTFILE

# Replace names etc.
sed -i "s/CompanyName/${NAME}/g" $INPUTFILE
sed -i "s/CompanyPassword/${CRYPTED}/g" $INPUTFILE
sed -i "s/CompanyBusinessId/${BUSINESSID}/g" $INPUTFILE
sed -i "s/CompanyTagline/${NAME}/g" $INPUTFILE
sed -i "s/CompanyWebsite/${BRURL}${BUSINESSID}/g" $INPUTFILE
sed -i "s/CompanyEmail/${EMAIL}/g" $INPUTFILE
sed -i "s/CompanyBankAccount/${BANKACCOUNT}/g" $INPUTFILE

psql -h 185.18.77.163 -U openerp -d postgres -c "CREATE DATABASE ${DB}"
psql -h 185.18.77.163 -U openerp -d $DB < $INPUTFILE >> /dev/null
