import React from 'react';
import { PageTitleContainer, PageTitleStyled, PageSubtitleStyled } from './styles';

interface PageTitleProps {
    title: string;
    subtitle?: JSX.Element | string;
}

const PageTitle: React.FC<PageTitleProps> = (props) => {
    return (
        <PageTitleContainer>
            <PageTitleStyled>{props.title}</PageTitleStyled>
            <PageSubtitleStyled>{props.subtitle}</PageSubtitleStyled>
                        
        </PageTitleContainer>
    )
}

export default PageTitle;