FROM ubuntu:16.04

RUN apt-get update && apt-get -y install wget tar git
RUN apt-get -y install clang libicu-dev libcurl4-openssl-dev libssl-dev libxml2

ENV SWIFT_DL_DIR https://swift.org/builds/swift-3.0.2-release/ubuntu1604/swift-3.0.2-RELEASE/
ENV SWIFT_DL_FILE swift-3.0.2-RELEASE-ubuntu16.04.tar.gz
ENV SWIFT_INSTALL_DIR /swift-3.0.2

RUN mkdir $SWIFT_INSTALL_DIR \
  && wget $SWIFT_DL_DIR$SWIFT_DL_FILE \
  && tar xzvf $SWIFT_DL_FILE -C $SWIFT_INSTALL_DIR --strip-components 1

ENV PATH $SWIFT_INSTALL_DIR/usr/bin:$PATH

# SSH
RUN apt-get install -y openssh-server
RUN mkdir /var/run/sshd
#RUN echo 'root:password' | chpasswd
RUN useradd -m git
RUN passwd -d git
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -ri 's/^UsePAM yes/UsePAM no/' /etc/ssh/sshd_config
RUN sed -ri 's/^PermitEmptyPasswords no/PermitEmptyPasswords yes/' /etc/ssh/sshd_config
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd

ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile

EXPOSE 22
CMD ["/usr/sbin/sshd", "-D"]
