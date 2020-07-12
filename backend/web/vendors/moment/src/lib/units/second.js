import { makeGetSet } from '../moment/get-set';
import { addFormatToken } from '../format/format';
import { addUnitAlias } from './aliases';
import { addRegexToken, match3to2, match2 } from '../parse/regex';
import { addParseToken } from '../parse/token';
import { SECOND } from './constants';

// FORMATTING

addFormatToken('s', ['ss', 2], 0, 'second');

// ALIASES

addUnitAlias('second', 's');

// PARSING

addRegexToken('s',  match3to2);
addRegexToken('ss', match3to2, match2);
addParseToken(['s', 'ss'], SECOND);

// MOMENTS

export var getSetSecond = makeGetSet('Seconds', false);
