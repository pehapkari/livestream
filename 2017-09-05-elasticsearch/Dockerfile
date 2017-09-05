FROM khezen/elasticsearch:5

RUN mkdir /usr/share/elasticsearch/config/hunspell && \
/usr/share/elasticsearch/config/hunspell/cs_CZ
ADD ./slovniky/cs_CZ.aff /usr/share/elasticsearch/config/hunspell/cs_CZ/cs_CZ.aff
ADD ./slovniky/cs_CZ.dic /usr/share/elasticsearch/config/hunspell/cs_CZ/cs_CZ.dic

RUN echo 'strict_affix_parsing: false' > /usr/share/elasticsearch/config/hunspell/cs_CZ/settings.yml
