import { makeGetSet } from '../moment/get-set';
import { addFormatToken } from '../format/format';
import { addUnitAlias } from './aliases';
import { addRegexToken, match3to2, match2 } from '../parse/regex';
import { addParseToken } from '../parse/token';
import { MINUTE } from './constants';

// FORMATTING

addFormatToken('m', ['mm', 2], 0, 'minute');

// ALIASES

addUnitAlias('minute', 'm');

// PARSING

addRegexToken('m',  match3to2);
addRegexToken('mm', match3to2, match2);
addParseToken(['m', 'mm'], MINUTE);

// MOMENTS

export var getSetMinute = makeGetSet('Minutes', false);
