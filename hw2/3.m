clc;
clear;
%----------data---------
Class1Data=[0.42, -0.087, 0.58; -0.2, -3.3, -3.4; 1.3, -0.32, 1.7; 0.39, 0.71, 0.23; -1.6, -5.3, -0.15;...
            -0.029, 0.89, -4.7; -0.23, 1.9, 2.2; 0.27, -0.3, -0.87; -1.9, 0.76, -2.1; 0.87, -1.0, -2.6];
Class2Data=[-0.4, 0.58, 0.089; -0.31, 0.27, -0.04; 0.38, 0.055, -0.035; -0.15, 0.53, 0.011; -0.35, 0.47, 0.034;...
            0.17, 0.69, 0.1; -0.011, 0.55, -0.18; -0.27, 0.61, 0.12; -0.065, 0.49, 0.0012; -0.12, 0.054, -0.063];
Class3Data=[0.83, 1.6, -0.014; 1.1, 1.6, 0.48; -0.44, -0.41, 0.32; 0.047, -0.45, 1.4; 0.28, 0.35, 3.1;...
            -0.39, -0.48, 0.11; 0.34, -0.079, 0.14; -0.3, -0.22, 2.2; 1.1, 1.2, -0.46; 0.18, -0.11, -0.49];

ClassData=[Class1Data;Class2Data;Class3Data];
%----------covariance---------
n = length(ClassData);
Cov = cov(ClassData(:,:));
S = Cov * (n-1)

%----------eigenvalue & eigenvector----------
[Vec, Val] = eig(S);

eigen_value_1=Val(1,1)
eigen_value_2=Val(2,2)
eigen_value_3=Val(3,3)


V=[Vec(:,3) Vec(:,2)];
data1 = Class1Data * V(:,:);
data2 = Class2Data * V(:,:);
data3 = Class3Data * V(:,:);
eigen_vector=Vec

m1 = mean(data1(:,:));
cov1 = cov(data1(:,:),1);
m2 = mean(data2(:,:));
cov2 = cov(data2(:,:),1);
m3 = mean(data3(:,:));
cov3 = cov(data3(:,:),1);

figure;
for i = 1 : 10
    plot(data1(i,1), data1(i,2), '.','MarkerSize',5,'Color','r');
    plot(data2(i,1), data2(i,2), '.','MarkerSize',5,'Color','g');
    plot(data3(i,1), data3(i,2), '.','MarkerSize',5,'Color','b');
    hold on 
end
title('2-dimentional subspace');
    
%----------misclassifed for w1---------
P1=1/3;
P2=1/3;
P3=1/3;

miss = 0;
mi1=0;
mi2=0;
mi3=0;

for i = 1 : length(data1)
    g1(i) = data1(i,:)*((-1/2)*inv(cov1))*data1(i,:)'+((inv(cov1)*m1')'*data1(i,:)'+...
        ( (-1/2) * m1 * ( inv(cov1) ) * m1') + (-1/2)*log(det(cov1)) +log(P1));
    
    g2(i) = data1(i,:)*((-1/2)*inv(cov2))*data1(i,:)'+((inv(cov2)*m2')'*data1(i,:)'+...
        ( (-1/2) * m2 * ( inv(cov2) ) * m2') + (-1/2)*log(det(cov2)) +log(P2));
    
    g3(i) = data1(i,:)*((-1/2)*inv(cov3))*data1(i,:)'+((inv(cov3)*m3')'*data1(i,:)'+...
         ( (-1/2) * m3 * ( inv(cov3) ) * m3') + (-1/2)*log(det(cov3)) +log(P3));
    if (g3(i) > g1(i)) | (g2(i) > g1(i))
        miss = miss + 1;
        mi1=mi1+1;
    end
end
%----------misclassifed for w2---------
for i = 1 : length(Class2Data)
    g1(i) = data2(i,:)*((-1/2)*inv(cov1))*data2(i,:)'+((inv(cov1)*m1')'*data2(i,:)'+...
        ( (-1/2) * m1 * ( inv(cov1) ) * m1') + (-1/2)*log(det(cov1)) +log(P1));
    
    g2(i) = data2(i,:)*((-1/2)*inv(cov2))*data2(i,:)'+((inv(cov2)*m2')'*data2(i,:)'+...
        ( (-1/2) * m2 * ( inv(cov2) ) * m2') + (-1/2)*log(det(cov2)) +log(P2));
    
    g3(i) = data2(i,:)*((-1/2)*inv(cov3))*data2(i,:)'+((inv(cov3)*m3')'*data2(i,:)'+...
         ( (-1/2) * m3 * ( inv(cov3) ) * m3') + (-1/2)*log(det(cov3)) +log(P3));
    if (g3(i) > g2(i)) | (g1(i) > g2(i))
        miss = miss + 1;
        mi2=mi2+1;
    end
end

%----------misclassifed for w3---------
for i = 1 : length(Class3Data)
    g1(i) = data3(i,:)*((-1/2)*inv(cov1))*data3(i,:)'+((inv(cov1)*m1')'*data3(i,:)'+...
        ( (-1/2) * m1 * ( inv(cov1) ) * m1') + (-1/2)*log(det(cov1)) +log(P1));
    
    g2(i) = data3(i,:)*((-1/2)*inv(cov2))*data3(i,:)'+((inv(cov2)*m2')'*data3(i,:)'+...
        ( (-1/2) * m2 * ( inv(cov2) ) * m2') + (-1/2)*log(det(cov2)) +log(P2));
    
    g3(i) = data3(i,:)*((-1/2)*inv(cov3))*data3(i,:)'+((inv(cov3)*m3')'*data3(i,:)'+...
         ( (-1/2) * m3 * ( inv(cov3) ) * m3') + (-1/2)*log(det(cov3)) +log(P3));
    if (g2(i) > g3(i)) | (g1(i) > g3(i))
        miss = miss + 1;
        mi3=mi3+1;
    end
end
 MissPercentage = miss / (length(data1) + length(data2) + length(data3))
